<!--extra-->

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'thats.php'
    });
  });
  </script>
<div class="ui-widget">
  <label for="skills">Skills: </label>
  <input id="skills">
</div>
<!--extra-->
