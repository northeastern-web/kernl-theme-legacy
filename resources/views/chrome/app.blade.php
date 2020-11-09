<div x-data="NUGlobalElements.header({
  skipToMainSelector: '#app' // or the ID of the element to skip to
})" x-init="init()" style="height: 48px; background-color: black"></div>

@include('chrome.local-header')

<main id="main">
  @yield('content')
</main>

<div x-data="NUGlobalElements.footer()" x-init="init()"></div>
