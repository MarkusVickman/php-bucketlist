</main>
<!-- Footer with info about creator and references -->
<footer class="footer">
  <div class="content has-text-centered">
    <p>
      Webbplatsen är skapad av <strong>Markus Vickman</strong>
    </p>
  </div>
  <div class="content has-text-centered">
    <p>
      Herobild Bucket list skapad av <a href="https://unsplash.com/@bullterriere"><strong>Simon Hurry</strong></a>
    </p>
    <p>
      Herobild Startsida skapad av <a href="https://unsplash.com/@pawel_czerwinski"><strong>Pawel Czerwinski</strong></a>
    </p>
  </div>
</footer>

<!-- jQuery and script for mobile menu -->
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script>
  $(document).ready(function() {

    // Check for click events on the navbar burger icon
    $(".navbar-burger").click(function() {

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      $(".navbar-burger").toggleClass("is-active");
      $(".navbar-menu").toggleClass("is-active");

    });
  });
</script>
</body>

</html>