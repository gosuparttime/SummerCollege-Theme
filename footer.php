</div>
<!-- end #container -->
<div class="container" id="footer">
<footer role="contentinfo" >
  <div id="inner-footer" class="clearfix">
  <div class="row-fluid" id="back-top"><a href="#top"><p><strong>Back to Top <i class="icon-arrow-up"></i></strong></p></a></div>
    <div class="row-fluid">
      <div class="span4 hidden-phone">
      <h3>Syracuse University Summer College</h3>
        <nav class="clearfix">
          <?php bones_footer_links(); // Adjust using Menus in Wordpress Admin ?>
        </nav>
      </div>
      <div class="span3 hidden-phone">
        <div class="row-fluid"><h3>Follow Us</h3></div>
        <ul id="social">
        <li><a href="https://www.facebook.com/SUSummerCollege" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/facebook-icon-up.png" alt="SU Summer College on Facebook" class="rollover"/></a></li>
        <li><a href="http://twitter.com/SUSummerCollege" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/twitter-icon-up.png" alt="SU Summer College on Twitter" class="rollover"/></a></li>
        </ul>
        <div class="row-fluid"><h3>Translate</h3>
        <div id="MicrosoftTranslatorWidget" style="width: 95%; min-height: 83px; border-color: #005594; background-color: #005594;"><noscript><a href="http://www.microsofttranslator.com/bv.aspx?a=http%3a%2f%2fsummercollege.syr.edu%2f"></a><br />Powered by <a href="http://www.bing.com/translator">Microsoft® Translator</a></noscript></div> <script type="text/javascript"> /* <![CDATA[ */ setTimeout(function() { var s = document.createElement("script"); s.type = "text/javascript"; s.charset = "UTF-8"; s.src = ((location && location.href && location.href.indexOf('https') == 0) ? "https://ssl.microsofttranslator.com" : "http://www.microsofttranslator.com" ) + "/ajax/v2/widget.aspx?mode=manual&from=en&layout=ts"; var p = document.getElementsByTagName('head')[0] || document.documentElement; p.insertBefore(s, p.firstChild); }, 0); /* ]]> */ </script> 
        </div>
      </div>
      <div class="span2" id="address">
        <h4>Syracuse University</h4>
        <address><p>Summer College<br />
          700 University Avenue,<br />
          Syracuse, NY 13244-2530</p></address>
        <p><a href="tel:13154435000"><span style="color:#fff;">315-443-5000</span></a><br />
          Fax: 315-443-4410</p>
        <p><strong><a href="mailto:sumcoll@syr.edu">sumcoll@syr.edu</a></strong></p>
      </div>
    <div class="span3"><div id="seal"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/images/UC-Logo.png" alt="University College of Syracuse University"/></div></div></div>
  </div>
  <!-- end #inner-footer --> 
  
</footer>
<!-- end footer -->
</div></div>

<!-- end #container -->
</div>

<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
<?php wp_footer(); // js scripts are inserted using this function ?>
<!-- Summer College tracking pixel / DigitalHyve -->
<script type="text/javascript">
adroll_adv_id = "O7KYCY6O3BHNRHRNXP2K2D";
adroll_pix_id = "2GKOLTRCTNC4JC6JG6V6VQ";
(function () {
var oldonload = window.onload;
window.onload = function(){
   __adroll_loaded=true;
   var scr = document.createElement("script");
   var host = (("https:" == document.location.protocol) ? "https://s.adroll.com <https://s.adroll.com/> " : "http://a.adroll.com <http://a.adroll.com/> ");
   scr.setAttribute('async', 'true');
   scr.type = "text/javascript";
   scr.src = host + "/j/roundtrip.js";
   ((document.getElementsByTagName('head') || [null])[0] ||
    document.getElementsByTagName('script')[0].parentNode).appendChild(scr);
   if(oldonload){oldonload()}};
}());
</script>
<!-- Summer College tracking pixel v2 / DigitalHyve -->
<!-- Piwik -->
<script type="text/javascript">
 var _paq = _paq || [];
 _paq.push(["setDocumentTitle", document.domain + "/" + document.title]);
 _paq.push(["setCookieDomain", "*.syr.edu"]);
 _paq.push(["setDomains", ["*.syr.edu"]]);
 _paq.push(['trackPageView']);
 _paq.push(['enableLinkTracking']);
 (function() {
   var u="//its-suwi.syr.edu/";
   _paq.push(['setTrackerUrl', u+'piwik.php']);
   _paq.push(['setSiteId', 1]);
   var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
   g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
 })();
</script>
<noscript><p><img src="//its-suwi.syr.edu/piwik.php?idsite=1&rec=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->
</body></html>