<?php
/**
Template Name: Submit
*/

get_header(); ?>

<div class="content">
<!-- LOOP beginnen -->
<?php if (have_posts()) : while (have_posts()) : the_post();?>
	<article id="page">
		<header>
			<h2><?php the_title(); ?></h2>
		</header>
		<?php the_content(); ?>
		
	</article>
<!-- THE LOOP afsluiten -->			
<?php endwhile; endif; ?>

<?php if(isset($succes)){
	echo $succes;
}?>
	<form id="form-reserveer" name="form-reserveer" action="<?php bloginfo('template_directory'); ?>/booking.php" method="post">
		<div class="form-container">
			<div class="input">
				<label for="methodname">Method name: </label>
				<input class="form-name autocomplete" type="text" title="" name="methodname" autofocus value="<?php $_POST['methodname'];?>" />
				<div class="feedback-small">
				</div>
			</div>
		</div>
		
		<div class="form-container">
			<div class="input">			
				<label for="description">Description: </label>
				<textarea class="form-description" name="description"><?php $_POST['description'];?></textarea>
				<div class="info" title="des">
					<header>Tips</header>
				</div>
				<div class="info-content">
					A description is a short introduction to the method. Use it to describe some key features of the method, like context and flow.
				</div>
			</div>
		</div>
		
		<div class="form-container">
			<div class="input">
				<label for="purpose">Purpose: </label>
				<textarea class="form-purpose" name="purpose"><?php $_POST['purpose'];?></textarea>
				<div class="info" title="pur">
					<header>Tips</header>
				</div>
				<div class="info-content">
					Use this field to describe the purpose of the research method. What should a researcher try to accomplish by using this method?
				</div>
			</div>
		</div>

		<div class="form-container">
			<div class="input">		
				<label for="poi">Points of interest: </label>
				<textarea class="form-poi" name="poi"><?php $_POST['poi'];?></textarea>
				<div class="info" title="poi">
					<header>Tips</header>
				</div>
				<div class="info-content">
					This field is to provide some handy pointers for researchers who want to use the method. Describe pro-tips and alert them to potential traps.
				</div>
			</div>
		</div>
			<!--
			<div class="show-info">Show info</div>
			<div class="reference-info">
			<div class="close-info">close<img class="icon" src="<?php bloginfo('template_directory'); ?>/images/close_icon.jpg" /></div>
				<h4>Referencing books</h4>
				Surname author, initials (Year of publication). Title. Possible subtitle. Location publisher: publisher.<br />
				<i>Example</i><br />
				Radzinsky E., Stalin (1996), Onthullingen uit geheime privé-archieven, Amsterdam. Uitgeverij Balans. Bladzijde 123<br />
				In de literatuurlijst komen de boeken alfabetisch op naam van de auteur!<br />
				<h4 class="margin-top">Verwijzen naar internetbronnen</h4>
				Achternaam auteur, voorletter(s) (Publicatiejaar of update). Titel de website. Geraadpleegd op dag maand jaar, adres website.<br />
				<i>Voorbeeld</i><br />
				Meijden, B. van der (1998). Schiphol als thema voor een geschiedenis-, internet- en/of profielwerkstuk.Geraadpleegd op 7 juli 2005, http://www.histopia.nl/schiphol.htm <br />
				<h4 class="margin-top">Verwijzen naar kranten- en tijdschriftartikelen</h4>
				Achternaam auteur, voorletter(s) (Publicatiedatum). Titel artikel. Eventuele subtitel. In: naam van tijdschrift of krant nummer, paginanummer(s). <br /> 
				<i>Voorbeeld</i><br />
				Ouwerkerk, D. van en J. van der Grinten (2004). De kracht van zacht. Wat mannen over vrouwelijke vergaderstijlen kunnen leren. In: Interne Communicatie 4, p. 11-13.
			</div> -->
			<?php $i = 1; ?>
		<div class="form-container">
			<div class="input">			
				<input class="field-counter-ref" type="hidden" name="amount" value="<?php echo count($reference_content);?>" />
				<label for="reference">Reference(s): </label>
				<div class="info block-info" title="ref">
					<header>Suggested format</header>
				</div>
				<div class="block-info-content">
					<strong>Books</strong><br />
					Lastname, Initial(s). (year of publication) Title. Location of publisher: publisher <br />
					<i>Example: Dickens, C. (1859). A tale of two cities. London: Chapman & Hall</i><br /><br />
					<strong>Articles</strong><br />
					Lastname, Initial(s). (year of publication) Title. In: name of article, pagenumber(s) <br />
					<i>Example: Dickens, C. (1859). A tale of two cities. In: All time bestsellers, p15.</i><br /><br />
					<strong>Websites</strong><br />
					Lastname, Initial(s). (year of publication) Title. Viewed on month day year, address. <br />
					<i>Example: Dickens, C. (1859). A tale of two cities. Viewed on July 7th 2011, http://www.dickens.com</i><br /><br />
					<strong>More than one?</strong><br />
					Press the +-button to add more input fields<br /><br />					
				</div>				
				<div class="input-container">
					<input type="text" class="form-reference input-example" name="ref-<?php echo $i;?>" title="press the button 'suggested format' for tips" value="press the button 'suggested format' for tips" />
					<img class="icon add-more" src="<?php bloginfo('template_directory'); ?>/images/plus_icon.jpg" />
					<div class="feedback">
						feedback
					</div>
				</div>
			</div>
		</div>				

		<div class="form-container">
			<div class="input">	
				<input class="field-counter-media" type="hidden" name="amount" value="<?php echo count($reference_content);?>" />			
				<label for="media">Media: </label>
				<div class="info block-info" title="media">
					<header>How to use</header>
				</div>
				<div class="block-info-content">
					<strong>Images</strong><br />
					Paste the link of the image in the field below<br />
					<i>Example: http://www.imagehost.com/logo.png</i><br /><br />
					<strong>Videos</strong><br />
					Paste the regular link (not embedded) in the field below<br />
					<i>Example: http://youtu.be/wrX6heUnevQ</i><br /><br />
					<strong>More than one?</strong><br />
					Press the +-button to add more input fields<br /><br />
				</div>	
				<div class="input-container">				
					<input class="form-media" type="text" name="media" value="<?php $_POST['media'];?>" />
					<img class="icon add-more2" src="<?php bloginfo('template_directory'); ?>/images/plus_icon.jpg" />
				</div>
			</div>
		</div>
		
		<div class="form-container">
			<div class="input">					
				<label for="email">Submitters email*: </label>
				<input class="form-email" type="text" name="email" value="<?php $_POST['email'];?>" />
				<div class="feedback">
					feedback
				</div>
			</div>
		</div>			
			<input class="form-submit float-left" type="submit" name="submit" value="Submit this method" />
	</form>
</div>