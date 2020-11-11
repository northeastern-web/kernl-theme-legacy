<div id="wufoo-{{ $id }}">
    Fill out my <a href="https://{{ $u }}.wufoo.com/forms/{{ $id }}">online form</a>.
</div>
<script type="text/javascript">var {{ $id }};(function(d, t) {
var s = d.createElement(t), options = {
"userName":"{{ $u }}",
"formHash":"{{ $id }}",
"autoResize":true,
"height":"auto",
"async":true,
"host":"wufoo.com",
"header":"{{ $header }}",
"defaultValues":"{{ $defaults }}",
"ssl":true};
s.src = ("https:" == d.location.protocol ? "https://" : "http://") + "www.wufoo.com/scripts/embed/form.js";
s.onload = s.onreadystatechange = function() {
var rs = this.readyState; if (rs) if (rs != "complete") if (rs != "loaded") return;
try { {{ $id }} = new WufooForm();{{ $id }}.initialize(options);{{ $id }}.display(); } catch (e) {}};
var scr = d.getElementsByTagName(t)[0], par = scr.parentNode; par.insertBefore(s, scr);
})(document, "script");</script>
