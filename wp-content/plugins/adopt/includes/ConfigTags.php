<?php
require_once('AdoptDBConfig.php');

function Adp_wpbHook_javascript()
{
?>
  <?php $idconsetimeto =  AdpExecComand(null); ?>

  <script>
    let wind = window.top;

    let adoptMetaTag = wind.document.createElement("meta");
    adoptMetaTag.name = "adopt-website-id";

    adoptMetaTag.content = '<?php echo esc_attr($idconsetimeto) ?>';
    wind.document.getElementsByTagName("head")[0].appendChild(adoptMetaTag);

    let adoptTag = wind.document.createElement("script");
    adoptTag.type = "text/javascript";
    adoptTag.charset = "utf-8";
    adoptTag.async = true;
    adoptTag.src = `//tag.goadopt.io/injector.js?website_code=<?php echo esc_attr($idconsetimeto)  ?>`;
    wind.document.getElementsByTagName("head")[0].appendChild(adoptTag);
  </script>
<?php
}