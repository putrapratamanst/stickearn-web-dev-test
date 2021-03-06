
<nav class="navbar navbar-expand navbar-dark" style="background-color: #6f42c1; border-radius:5px;margin-bottom: 10px;">
    <div class="container-fluid">
    <a class="navbar-brand pb-2" href="#">
        <img src="{{ asset('assets/images/logo.jpg') }}" width="30" height="30" class="d-inline-block align-top" alt="">
      </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav align-self-end flex-wrap" id="nav">
            <li class="nav-item">
                <a class="nav-link" href="/scrambler/playground">Play Game!</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/result/history/">History Game</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/" onclick="return confirm('Are you sure to quit the game?')">Quit Game</a>
            </li>
            <li class="nav-item dropdown d-none">
                <a class="nav-link" href="#" id="navbarDropdownMenu" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="navbar-toggler-icon"></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-right bg-secondary" aria-labelledby="navbarDropdownMenu">
                </ul>
            </li>
        </ul>
    </div>
    </div>
</nav>
<script>
    var autocollapse = function (menu,maxHeight) {
    
    var nav = $(menu);
    var navHeight = nav.innerHeight();
    if (navHeight >= maxHeight) {
        
        $(menu + ' .dropdown').removeClass('d-none');
        $(".navbar-nav").removeClass('w-auto').addClass("w-100");
        
        while (navHeight > maxHeight) {
            //  add child to dropdown
            var children = nav.children(menu + ' li:not(:last-child)');
            var count = children.length;
            $(children[count - 1]).prependTo(menu + ' .dropdown-menu');
            navHeight = nav.innerHeight();
        }
        $(".navbar-nav").addClass("w-auto").removeClass('w-100');
        
    }
    else {
        
        var collapsed = $(menu + ' .dropdown-menu').children(menu + ' li');
      
        if (collapsed.length===0) {
          $(menu + ' .dropdown').addClass('d-none');
        }
      
        while (navHeight < maxHeight && (nav.children(menu + ' li').length > 0) && collapsed.length > 0) {
            //  remove child from dropdown
            collapsed = $(menu + ' .dropdown-menu').children('li');
            $(collapsed[0]).insertBefore(nav.children(menu + ' li:last-child'));
            navHeight = nav.innerHeight();
        }

        if (navHeight > maxHeight) { 
            autocollapse(menu,maxHeight);
        }
    }
}

$(document).ready(function () {

    // when the page loads
    autocollapse('#nav',50); 
    
    // when the window is resized
    $(window).on('resize', function () {
        autocollapse('#nav',50); 
    });

});

    </script>