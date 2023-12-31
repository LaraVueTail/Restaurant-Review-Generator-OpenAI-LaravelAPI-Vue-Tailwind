<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="icon" type="image/svg+xml" href="assets/logo.svg" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Restaurant Review Generator</title>
    
  <!-- dark mode switcher -->
  <script>
    // On page load or when changing themes, best to add inline in `head` to avoid FOUC
    if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark')
    }
  </script>
    <script type="module" crossorigin src="/assets/index-b60d7a98.js"></script>
    <link rel="stylesheet" href="/assets/index-ba981091.css">
  </head>
  <body>
    <div id="app" class="dark"></div>
    
  </body>
</html>
