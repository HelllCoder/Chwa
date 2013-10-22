<h1>Založení obchodního stánku</h1>
<figure id = 'bojisko'>
</figure>
<form  action='game.php?page=zalozenistanku' method='post' id = "bojisko" >
	<input type='hidden' name='sent' value=''/>	
	<input type='text' name='jmeno' maxlength='32' placeholder = 'Název nového stánku'/>
	<a class = "chwaTlacitko" onclick = "document.querySelector('form#bojisko').submit()" type='submit' name='send' title = "Vyzvat k boji">Založit stánek - 100  <img title = "mince"  src = "img/coinmini.png"/></a>
	<!-- mehehe, toto nebolo bohviečo, ale účel to splnilo -->
</form>