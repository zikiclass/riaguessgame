@extends('app')
@section('content')

<section class="header">
<nav>

<a href="/"><img src="img/logo.jpeg"></a>
<div class="nav-links" id="navLinks">
<i class="fa fa-times" onclick="hideMenu()"></i>

<ul>
    <li><a href="/">HOME</a></li>
    <li><a href="#about">ABOUT</a></li>
    <li><a href="blog">BLOG</a></li>
    <li><a href="#contact">CONTACT</a></li>
    <li><a href="login">LOGIN</a></li>
    <li><a href="signup">REGISTER</a></li>
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

<section class="gamerule rules">
<h1>Game Rules</h1>
<p>Below are the rules on how to play the games</p>
<div class="row-gamerule">
<div class="gamerules-col">
<p><span>[1]</span><br/><strong>2 persons</strong> at both sides.</p>
</div>
<div class="gamerules-col">
<p><span>[2]</span><br/>Beautiful rounds holes created with names to identify the place to score</p>
</div>
<div class="gamerules-col">
<p><span>[3]</span><br/>The small ‘item’ in using to score is called ‘JESH’</p>
</div>
<div class="gamerules-col">
<p><span>[4]</span><br/>The longer ‘item’ to control your guessing score is named – “GBAYE”</p>
</div>
<div class="gamerules-col">
<p><span>[5]</span><br/>There is a place of taking off to play</p>
</div>
<div class="gamerules-col">
<p><span>[6]</span><br/>In a competition, there must be a REFEREE to guide</p>
</div>
<div class="gamerules-col">
<p><span>[7]</span><br/>In a place of trust and honesty of home play, two people are involved</p>
</div>
<div class="gamerules-col">
<p><span>[8]</span><br/>The ‘Demarcating Board’ is what makes it ‘GUESS’e.g your hand movement is shielded from your fellow player</p>
</div>
<div class="gamerules-col">
<p><span>[9]</span><br/>The Referee or both player decides on number of times you make each guess play before arriving at a ‘WINNER’</p>
</div>
<div class="gamerules-col">
<p><span>[10]</span><br/>In a Draw-Where there is no Winner, both Referee and players decide on what is called, ‘RIA SCORE’ for a winner to emerge</p>
</div>
</div>
</section>

<section class="gamerule" id="about">
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
<section class="game" id="games">
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

<section class="contact" id="contact">
<h1>Contact Us</h1>
<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Assumenda, fugit.</p>
<div class="row">
<div class="contact-col">
<img src="" alt=""/>
</div>
<div class="contact-col">

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
<li><a href="#about">About Us</a></li>
<li><a href="#contact">Contact</a></li>
<li><a href="#games">Our Games</a></li>
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