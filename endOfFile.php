      	
            </div>
            	  		
	  		<div id="docfoot">
	  			<center>
	  			<?php $userid = $_SESSION['uid'];
    				if ($userid != null) {
    	 			echo "<a href='logout.php'>";
    	 			echo "Click here to log out!";
    	 			echo "</a>";
    			}
    			?>
	  			
	  			<br><br>
            	<h5>Created by: <a href="http:/bissoncreative.com">Bisson Creative</a>, &copy 2014</h5>
            	</center>
  			</div>
  		</div>
	</div>
<script src="jquery.nivo.slider.pack.js" type="text/javascript"></script> 
</body>
</html>