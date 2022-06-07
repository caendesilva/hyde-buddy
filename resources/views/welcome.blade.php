<x-app-layout>
    <x-slot name="title">Welcome!</x-slot>

    <h1 class="text-center m-large">Welcome to Hyde Buddy!</h1>

    @if(Project::count())
    <header class="text-center m-large">
        <h2>Buddy is set up and ready to go!</h2>
        <a href="{{ route('dashboard') }}" class="btn btn-success me-2">Go to Dashboard</a>
    </header>
    @else
    <section>
        <header class="text-center m-large">
            <h2>Could not find any projects. Let's get one set up!</h2>
            <p>
                Don't have a Hyde project yet? Take a look at
                <a href="https://hydephp.github.io/docs/master/quickstart.html">the installation docs</a>
            </p>
        </header>

        <form class="mx-auto" action="{{ route('projects.store') }}" method="POST">
            @csrf
            <fieldset>
                <legend>
                    Project setup
                </legend>
                <div class="m-small">
                    <label for="path">
                        Please enter the full path to your Hyde project
                    </label>
                    <input required type="text" id="path" name="path"
                           placeholder="e.g. C:\Users\Hyde\Desktop\MyNewHydeProject"
                           value="{{ old('path') }}">
                    @error('path')
                    <label for="path"><strong>Error:</strong> {{ $message }}</label>
                    @enderror
                </div>

                <div class="m-small">
                    <label for="name">
                        Optionally enter a name for your project
                    </label>
                    <input type="text" id="name" name="name"
                           placeholder="e.g. My Website"
                           value="{{ old('name') }}">
                    @error('name')
                    <label for="name"><strong>Error:</strong> {{ $message }}</label>
                    @enderror
                      
                    <div class="m-small text-right">
                        <input type="submit">
                    </div>
                </div>
            </fieldset>
        </form>
    </section>
    @endif
</x-app-layout>
