<x-app-layout>
    <x-slot name="title">Welcome!</x-slot>

    <h1 class="text-center m-large">Welcome to Hyde Buddy!</h1>

	<header class="text-center m-large">
		<h2>Let's get the boring stuff out of the way.</h2>
	</header>

	<form class="mx-auto" method="POST">
		@csrf
		<fieldset>
			<legend>
				Buddy Installer
			</legend>
			<p>
				<h3>Quick warning: </h3><b>The Hyde Buddy software is incredibly much in alpha</b>. 
				
				While I'm really excited that you want to try it out,
				please know that <b>there will be bugs</b> and usage of this software is at your own risk and is subject to the MIT License agreement.
			</p>

<pre>
<textarea readonly cols="80" rows="10" width="auto" style="white-space: pre">
MIT License

Copyright (c) 2022 Caen De Silva

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
</textarea>
</pre>

			<label>
				<input required type="checkbox" name="terms" id="terms" @checked(old('terms')) />
				I understand that I am using this software at my own risk and would like to continue.<br>
				I also agree to the license agreement shown above.
			</label>
			
			<div class="inline text-right">
				<input type="submit" value="Setup Application">
			</div>
		</fieldset>
	</form>
</x-app-layout>
