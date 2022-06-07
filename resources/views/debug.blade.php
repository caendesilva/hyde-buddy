<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Application Debug Screen</title>
</head>
<body>
	<h1>Application Debug Screen</h1>

	<section>
		<h2>Core information</h2>
		<dl>
			<dt>Configuration home directory</dt>
			<dd>{{ app('homePath') }}</dd>

            <dt>Active project registered on disk</dt>
            <dd>{{ file_exists(app('homePath') . '\\database\\activeProject')
                   ? file_get_contents(app('homePath') . '\\database\\activeProject') : 'false' }}</dd>

            <dt>Hyde root path</dt>
            <dd>{{ \Hyde\Framework\Hyde::path() }} </dd>
        </dl>
	</section>

	<section>
		<h2>Server information</h2>
		<dl>
			<dt>PHP Version</dt>
			<dd>{{ PHP_VERSION }}</dd>

			<dt>PHP SAPI</dt>
			<dd>{{ php_sapi_name() }}</dd>

			<dt>PHP OS</dt>
			<dd>{{ PHP_OS }}</dd>

			<dt>Laravel Version</dt>
			<dd>{{ Illuminate\Foundation\Application::VERSION }}</dd>

			<dt>Laravel Application Path</dt>
			<dd>{{ app_path() }}</dd>

			<dt>Laravel Base Path</dt>
			<dd>{{ base_path() }}</dd>
		</dl>
	</section>

	<section>
		<h2>Database information</h2>
		<dl>
			<dt>Database Driver</dt>
			<dd>{{ config('database.default') }}</dd>

			<dt>Database Name</dt>
			<dd>{{ config('database.connections.'.config('database.default').'.database') }}</dd>
		</dl>
	</section>

	<section>
		<h2>Application configuration</h2>
		<dl>
			<dt>Application Name</dt>
			<dd>{{ config('app.name') }}</dd>

			<dt>Application Environment</dt>
			<dd>{{ config('app.env') }}</dd>

			<dt>Application Debug</dt>
			<dd>{{ config('app.debug') }}</dd>
		</dl>
	</section>
</body>
</html>
