<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<article>
	<meta charset="UTF-8" />
	<title>submit button</title>
	<title></title>
</article>
<body>

<link href="dist/submit.button.css"  rel="submitbutton">
<script src="dist/submit-button.js">
</script>
	
	<!--
	<div class="center-component">
		<button class="colins-submit">
			<svg width="196" height="70" 
				viewPort="0 0 196 70" version="1.1">
					  
				<rect class="btn-shape btn-bg"
							x="3" y="3" 
							width="190" height="64"
							rx="32" ry="32" 
							fill="#ffffff"
							fill-opacity="1"
							stroke="#ccc" stroke-width="4"
							/rect>	
				<rect class="btn-shape btn-color"
							x="3" y="3" 
							width="190" height="64"
							rx="32" ry="32" 
							fill="#ffffff"
							fill-opacity="0"
							stroke="rgb(30,205,151)" stroke-width="4"
							/rect>
							
				<text class="checkNode" x="96" y="40" 
							font-family="Montserrat" 
							font-size="22"
							fill-opacity="1"
							text-anchor="middle"
							fill="rgb(255,255,255)" >
						123
				</text>
				<text class="textNode" x="96" y="40" 
							transform="scale(1)"
							font-family="Montserrat" 
							font-size="16"
							fill-opacity="1"
							text-anchor="middle"
							fill="rgb(30,205,151)" >
						Submit
				</text>
			</svg>
		</button>
		<p>
			My 
			<a href="https://www.greensock.com/gsap-js/" target="_blank">
				Greensock
			</a>
				controlled version of 
			<a href="https://dribbble.com/shots/1426764-Submit-Button" target="_blank">
				Colin Garven's Submit button
			</a>
				. No CSS Keyframes, all one JS timeline + SVG.
		</p>
		
	</div>
	-->
	
	
	<div class="center-component">
	<button class="colins-submit">
		<svg width="196" height="70" viewport="0 0 196 70" version="1.1" xmlns="http://www.w3.org/2000/svg">
		  
		  <rect class="btn-shape btn-bg" x="3" y="3" width="190" height="64" rx="32" ry="32" fill="#ffffff" fill-opacity="1" stroke="#ccc" stroke-width="4" style="fill: rgb(255, 255, 255);"></rect>	
		  <!--<rect class="btn-shape btn-color" x="3" y="3" width="190" height="64" rx="32" ry="32" fill="#ffffff" fill-opacity="0" stroke="rgb(30,205,151)" stroke-width="4" style="fill: rgb(255, 255, 255);"></rect>-->
		  <!--<rect class="btn-shape btn-color" x="3" y="3" width="190" height="64" rx="32" ry="32" fill="#ffffff" fill-opacity="2" stroke="rgb(30,205,151)" stroke-width="6" style="fill: rgb(255, 255, 255);"></rect>-->
		  <!--<oergji class>-->
		  
		  <text class="checkNode" x="96" y="40" font-family="Montserrat" font-size="22" fill-opacity="1" text-anchor="middle" fill="rgb(255,255,255)">
			✔
		  </text>
		  
		  <text class="textNode" x="96" y="40" transform="scale(1)" font-family="Montserrat" font-size="16" fill-opacity="1" text-anchor="middle" fill="rgb(30,205,151)" style="fill: rgb(30, 205, 151);">
			Submit
		  </text>
		  
		</svg>
	</button>
	</div>
</body>
</html>