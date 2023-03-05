@extends('app')
@section('content')

<section class="header">
<nav>

<a href="/"><img src="img/logo.jpeg"></a>
<div class="nav-links" id="navLinks">
<i class="fa fa-times" onclick="hideMenu()"></i>

<ul>
    <li><a href="/">HOME</a></li>
    <li><a href="about">ABOUT</a></li>
    <li><a href="blog">BLOG</a></li>
    <li><a href="contact">CONTACT</a></li>
</ul>
</div>
<i class="fa fa-bars" onclick="showMenu()"></i>

</nav>

<div class="text-box">
<h1><span>Ria</span> Guess <span id="and">&amp;</span> Score <span>Game</span></h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque labore, harum fugit veritatis repudiandae dolore. <br/>Doloremque, quam temporibus quod mollitia magni voluptas ex maiores. <br/>Nobis eligendi quis repellendus laudantium quam.</p>
<a href="about" class="hero-btn">Visit Us To Know More</a>
</div>
</section>

<section class="gamerule">
<h1>Game Rules</h1>
<p>Below are the rules on how to play the games</p>
<div class="row">
<div class="gamerules-col">
<p><span>[1]</span><br/>It is a <strong>home game</strong> both for the young and the old.</p>
</div>
<div class="gamerules-col">
<p><span>[2]</span><br/>It will be to refresh the mind because human mind is a reflection of what mental faculty evolves.</p>
</div>
<div class="gamerules-col">
<p><span>[3]</span><br/>The Guess (thinking) ability of a person to guess right is put to functioning ability.</p>
</div>
<div class="gamerules-col">
<p><span>[4]</span><br/>When your guess, it means the deep calls to the deep, you may score or not, but the reflection and re-engineering of the role in the body system of a person comes to play.</p>
</div>
</div>
</section>

<section class="gamerule">
<h1>About The Game</h1>
<p>A Game of High Thinking Ability</p>
<div class="row">
<div class="gamerule-col">
<p><span>[1]</span><br/>It is a <strong>home game</strong> both for the young and the old.</p>
</div>
<div class="gamerule-col">
<p><span>[2]</span><br/>It will be to refresh the mind because human mind is a reflection of what mental faculty evolves.</p>
</div>
<div class="gamerule-col">
<p><span>[3]</span><br/>The Guess (thinking) ability of a person to guess right is put to functioning ability.</p>
</div>
<div class="gamerule-col">
<p><span>[4]</span><br/>When your guess, it means the deep calls to the deep, you may score or not, but the reflection and re-engineering of the role in the body system of a person comes to play.</p>
</div>
</div>
</section>
<section class="game">
<h1>Our Games</h1>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Consequuntur, doloremque!</p>
<div class="row">
    <div class="game-col">
        <h3>RiaGuess</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit accusantium ipsa debitis necessitatibus iure! Voluptatem ullam, tempore quae necessitatibus rem velit eos quaerat iste alias!</p>
    </div>
    <div class="game-col">
        <h3>RiaGuess</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit accusantium ipsa debitis necessitatibus iure! Voluptatem ullam, tempore quae necessitatibus rem velit eos quaerat iste alias!</p>
    </div>
    <div class="game-col">
        <h3>RiaGuess</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit accusantium ipsa debitis necessitatibus iure! Voluptatem ullam, tempore quae necessitatibus rem velit eos quaerat iste alias!</p>
    </div>

</div>
</section>
<section class="features">
<h1>Our Features</h1>
<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est ipsum nihil officia ipsa aperiam id?</p>

<div class="row">
    <div class="features-col">
        <img src="img/gamefeat2.webp" alt="">
        <div class="layer">
            <h3>Nice Theme</h3>
        </div>
    </div>
    <div class="features-col">
        <img src="img/gamefeat1.jpg" alt="">
        <div class="layer">
            <h3>Smart Game</h3>
        </div>
    </div>
    <div class="features-col">
        <img src="img/gamefeat3.webp" alt="">
        <div class="layer">
            <h3>Cool Feels</h3>
        </div>
    </div>
</div>
</section>

<section class="footer">
<a href="/"><img src="img/logo.jpeg"/></a>
<div>
<p class="copyright">- Riaguessgameandscore (v1.0) -<br/> &copy; <?php echo date("Y"); ?> <i>All rights reserved</i></p> 

</div>
<div>
<ul>
<li><a href="/">Home</a></li>
<li><a href="/">About Us</a></li>
<li><a href="/">Contact</a></li>
<li><a href="/">Our Games</a></li>
</ul>
</div>
</section>
@endsection

@push('scripts')
<script>
    var navLinks = document.getElementById("navLinks");

function hideMenu(){
    navLinks.style.right = "-200px";
}
function showMenu(){
    navLinks.style.right = "0";

}
    </script>

@endpush