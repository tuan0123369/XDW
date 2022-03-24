<!-- Reference block for JS -->
<div class="ref" id="ref">
    <div class="color-primary"></div>
    <div class="chart">
        <div class="color-primary"></div>
        <div class="color-secondary"></div>
    </div>
</div>
<script>
    (function(i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function() {
            (i[r].q = i[r].q || []).push(arguments)
        }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
    ga('create', 'UA-80463319-4', 'auto');
    ga('send', 'pageview');
</script>
<script src="Admin/js/vendor.js"></script>
<script src="Admin/js/app1.js"></script>
<script>
    $(document).ready(function() {
        $("ul.sidebar-menu li:first-child").addClass("active");
        $("ul.sidebar-menu li").each(function() {
            $(this).click(function() {
                $("ul.sidebar-menu li").removeClass("active");
                $(this).addClass("active");
            })
        })
    })
</script>


<footer class="footer">
    {{-- <div class="footer-block buttons">
        <iframe class="footer-github-btn" src="https://ghbtns.com/github-btn.html?user=modularcode&repo=modular-admin-html&type=star&count=true" frameborder="0" scrolling="0" width="140px" height="20px"></iframe>
    </div>
    <div class="footer-block author">
        <ul>
            <li> created by <a href="https://github.com/modularcode">ModularCode</a>
            </li>
            <li>
                <a href="https://github.com/modularcode/modular-admin-html#get-in-touch">get in touch</a>
            </li>
        </ul>
    </div> --}}
</footer>