<?php

namespace App\Providers;

use Composer\InstalledVersions;
use Hyde\Framework\Contracts\AssetServiceContract;
use Hyde\Framework\Hyde;
use Hyde\Framework\Models\BladePage;
use Hyde\Framework\Models\DocumentationPage;
use Hyde\Framework\Models\MarkdownPage;
use Hyde\Framework\Models\MarkdownPost;
use Hyde\Framework\Services\AssetService;

class HydeServiceProvider extends \Hyde\Framework\HydeServiceProvider
{
	public function register(): void
	{
		if (!$this->app->make('isSetup') || !$this->app->make('hasActiveProject')) {
			return;
		}

		Hyde::setBasePath(file_get_contents($this->app->make('homePath') . '\\database\\activeProject'));
		/**
		 * @deprecated
		 */
		$this->app->bind(
			'hyde.version',
			function () {
				return InstalledVersions::getPrettyVersion('hyde/hyde') ?: 'unreleased';
			}
		);

		/**
		 * @deprecated
		 */
		$this->app->bind(
			'framework.version',
			function () {
				return InstalledVersions::getPrettyVersion('hyde/framework') ?: 'unreleased';
			}
		);

		$this->app->singleton(AssetServiceContract::class, AssetService::class);

		$this->registerDefaultDirectories([
			BladePage::class => '_pages',
			MarkdownPage::class => '_pages',
			MarkdownPost::class => '_posts',
			DocumentationPage::class => '_docs',
		]);

		$this->discoverBladeViewsIn('_pages');

		$this->storeCompiledSiteIn(config(
			'hyde.site_output_path',
			Hyde::path('_site')
		));
	}

	public function boot(): void
	{
		config(['hyde.create_default_directories' => false]);
		parent::boot();
	}
}
