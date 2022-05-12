<section>
    @if(! Buddy::hasHydeInstance())
    <div class="container mx-auto mb-8">
        <header class="text-center mb-4">
            <h2>Hyde Setup Manager</h2>
            <p class="lead mb-2">
                Could not find a Hyde installation. Let's get one set up!
            </p>
            <p class="text-sm">
                Don't have a Hyde project yet? Take a look at
                <a href="https://hydephp.github.io/docs/master/quickstart.html">the installation docs</a>
            </p>
        </header>
        
        <div class="container col-10 col-xl-8 col-xxl-6 py-4">
            @if($formProgress >= 1)
            <h3 class="h5">
                1. Let's find your Hyde project!
            </h3>
            <form wire:submit.prevent="findHydeProject">
                <div class="form-group">
                    <label for="path" class="ms-0">
                        Please enter the full path to your Hyde project
                        @if($formProgress > 1)
                        ✅
                        @endif
                    </label>
                    <div class="input-group" @if($formProgress > 1) title="Please refresh your page to change the path" @endif>
                        <input type="text" class="form-control form-control-lg @error('path') is-invalid @enderror" id="path" wire:model="path" placeholder="e.g. C:\Users\Hyde\Desktop\MyNewHydeProject" required @disabled($formProgress > 1)>
                        <button type="submit" @class([ 'my-0 btn', 'btn-primary' => $formProgress <= 1, 'btn-success' => $formProgress > 1, ]) @disabled($formProgress > 1)> Find Project </button>
                    </div>
                </div>
                @error('path')
                <div class="invalid-feedback d-block">
                    <strong>Error:</strong> {{ $message }}
                </div>
                @enderror
            </form>
            @endif
            
            @if($formProgress >= 2)
            <br>
            
            <h3 class="h5">
                2. Quick heads up before we proceed!
            </h3>
            <p class="text-std">
                <b>The Hyde Buddy is incredibly much in alpha</b>. While I'm really excited that you want to try it out,
                please know that <b>there will be bugs</b> and usage of this software is at your own risk.
            </p>
            <p class="text-std">
                Please share your feedback, suggestions, and bug reports at GitHub:
                <a href="https://github.com/hydephp/buddy">github.com/hydephp/buddy</a>!
            </p>
            <form wire:submit.prevent="setup">
                <div class="form-group my-2">
                    <div class="d-flex align-items-center">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="terms" wire:model="terms" required>
                            <label class="form-check-label pe-4 mb-0" for="terms">
                                I understand that I am using this software at my own risk and I also accept the terms of
                                <a href="https://github.com/hydephp/hyde/blob/master/LICENSE.md" target="_blank">the MIT License agreement</a>.
                            </label>
                        </div>
                        <button type="submit" class="btn btn-warning my-0">Proceed</button>
                    </div>
                </div>
            </form>
            @endif

            <div class="w-100" {{ $formProgress < 3 ? 'wire:loading' : '' }} wire:target="setup">
                <br>
            
                <h3 class="h5">
                    3. Setting up project...
                </h3>
                <p class="text-std">
                    Your project is being set up. This may take a few seconds.
                </p>
            </div>
        </div>
    </div>
    @endif
</section>
