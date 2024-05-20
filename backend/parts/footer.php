<footer>
        <!-- Include Footer -->
        <div id="footer"></div>
    </footer>
    <script>
        window.onload = function () {
            // Include Header
            fetch("/pages/html/header.html")
                .then(response => response.text())
                .then(data => document.querySelector("header").innerHTML = data);

            // Include Footer
            fetch("/pages/html/footer.html")
                .then(response => response.text())
                .then(data => document.querySelector("footer").innerHTML = data);
        }
    </script>