<style type="text/css">
   /* Make room for the mini-form */
   html body { margin-top: 60px; }

   /* Reset all styles */
   #include * {
      text-align: left;
      border: 0; padding: 0; margin: 0;
      font: 12px Verdana,Arial,Tahoma;
      color: #eee;
      font-weight: normal;
      background: transparent;
      text-decoration: none;
      display: inline;
   }
   #include p {
      margin: 4px 0 0 10px;
      display: block;
   }
   #include b {
      font-weight: bold;
   }
   #include script {
      display:none;
   }

   /* Style the mini-form div */
   #include {
      border-top: 3px solid #ce6c1c;
      border-bottom: 3px solid #ce6c1c;
      background: #0b1933;
      position: fixed;
      top:0; left:0;
      width: 100%;
      height: 60px;
      z-index: 100000;
   }

   /* Mini-form elements */
   #include a {
      color: #ce6c1c;
   }
   #include a:hover {
      color: #ccc;
   }
   #include .url-input {
      padding: 2px;
      background: #eee;
      color: #111;
      border: 1px solid #ccc;
   }
   #include .url-input:focus {
      background: #fff;
      border: 1px solid #ce6c1c;
   }
   #include .url-button {
      font-weight: bold;
      border-style: outset;
      font-size: 11px;
      line-height: 10px;
   }
</style>
<div id="include">

<link rel="stylesheet" type="text/css" href="/bibblio-related-content-module/css/bib-related-content.css">
<script src="/bibblio-related-content-module/js/bib-related-content.js"></script>


<script>
   function insertRCM() {
      var selector = document.getElementById('rcm-elem').value;

      // class name
      if (selector[0] == '.') {
         var selector = selector.substring(1);
         var parent = document.getElementsByClassName(selector)[0];

      // id
      } else if (selector[0] == '#') {
         var selector = selector.substring(1);
         var parent = document.getElementById(selector);

      // default to id
      } else {
         var parent = document.getElementById(selector);
      }

      var rcm = document.createElement("div");
      rcm.setAttribute("id", "bib_related-content");

      parent.appendChild(rcm);
      showRCM();
   }

   function showRCM() {
     Bibblio.initRelatedContent(
       {
           styleClasses: "bib--title-only bib--shine bib--col-3 bib--square", // Custom CSS classes
           showRelatedBy: true,
           subtitleField: 'provider.name',  // default: headline. passing a value of false will disable the subtitle completely
           contentItemId: '1cc62426-cc6a-4c28-8dd1-a3e566790d30',
           recommendationKey: 'da2747ea-c10d-4407-a90d-69e6121612ff',
           targetElementId: 'bib_related-content'
       },
       {
         onRecommendationClick: function(activityData, event) {
           // Do callback implementation
         }
       });
   }
</script>

<?php
// Print form using variables (saves repeatedly opening/closing PHP tags)
// Edit as if normal HTML but escape any dollar signs
echo <<<OUT
   <form action="{$proxy}/includes/process.php?action=update" target="_top" method="post" onsubmit="return updateLocation(this);">

      <p>

         <b>URL:</b>
         <input type="text" name="u" size="40" value="{$url}" class="url-input" style="width:50%;" />
         <input type="submit" value="Go" class="url-input url-button" />

         [<a href="{$proxy}/index.php" target="_top">home</a>]
         [<a href="{$proxy}/includes/process.php?action=clear-cookies&return={$return}" target="_top">clear cookies</a>]

      </p>

      <p>

         <b>DOM element to append to:</b>
         <input type="text" name="rcm-elem" id="rcm-elem" size="40" value="left-hand-column" class="url-input" style="width:25%;" />
         <input type="button" value="Insert RCM" class="url-input url-button" onClick="javascript:insertRCM()" />
OUT;

?>
      </p>

   </form>

</div>

<!--[proxied]-->
