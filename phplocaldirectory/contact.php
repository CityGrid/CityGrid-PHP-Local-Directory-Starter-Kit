<?php
include "header.php";

// what
if(isset($_REQUEST['what'])){ $what = $_REQUEST['what'];} elseif(isset($_POST['what'])){$what = $_POST['what']; } else { $what = $FeatureCategory; }
// where
if(isset($_REQUEST['where'])){ $where = $_REQUEST['where'];} elseif(isset($_POST['where'])){$where = $_POST['where']; } else { $where=$Site_Where; }
?>
		
<div class="span14">

	 <div class="page-header">
	    <h2>Contact</h2>
	  </div>
	  
	  <div class="row">
	    <div class="span12">
	      <form>
	        <fieldset>
	         
	          
	          <div class="clearfix">
	            <label for="xlInput">Subject:</label>
	            <div class="input">
	              <input class="xlarge" id="Subject" name="Subject" size="30" type="text" />
	            </div>
	          </div><!-- /clearfix -->
	          
	          <div class="clearfix">
	            <label for="disabledInput">Message:</label>
	            <div class="input">
	              <textarea class="xxlarge" name="Message" id="Message" rows="3"></textarea>
	            </div>
	          </div><!-- /clearfix -->
	          
	        </fieldset>
	          
	          <div class="actions">
	            <input type="submit" class="btn primary" value="Send Message">&nbsp;<button type="reset" class="btn">Cancel</button>
	          </div>
	          
	        </fieldset>
	      </form>
	    </div>
	  </div><!-- /row -->

</div>
        
<?php
include "footer.php";
?>