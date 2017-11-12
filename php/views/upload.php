<h1>CS123 - Test Course - Lab Report 1</h1>
<h2>Out of: <strong>150</strong> marks</h2>
<hr>
<form id="update-max-form">
	<div id="update-max-error"></div>
	<input type="text" class="input" id="max-grade" placeholder="Grade item is now out of...">
	<button type="button" id="update-max" class="btn btn-success">Update maximum</button>
</form>
<hr>
<h2>Automated Upload</h2>
<div class="page-section">
	<h2>Upload a File</h2>
	<div id="file-error"></div>
	  <form id="upload-automated" action="actions/file_parse.php" method="POST" enctype="multipart/form-data" target="upload-target">
         	<label id="file" class="custom-file-upload-btn">
				<i class="fa fa-cloud-upload"></i> Upload File
			</label>
			<input id="file" type="file" name="file"/>
          	<p></p>
	  		<button class="btn" type="submit">Upload Grades File</button>
      </form>
	  <iframe class="hidden-iframe" id="upload-target" name="upload-target" src="#" style="width:0;height:0;border:0px solid #fff;"></iframe>   
</div>
<h2>Manual Grade Input</h2>
<div class="page-section">
	<h4>Search to add a student: </h4>
	<form>	
		<input id="members" class="input" type="text" onkeyup="handleInputKeyUp()" placeholder="Enter Student Name or ID...">
		<div class="form-checkbox">
			<input id="members-cb" type="checkbox" onchange="handleCheckboxChange()">
			<label class="mini">Select all</label>
		</div>
	</form>
	<hr>
	<div id="manual-grade-input"></div>
	<button type="button" id="manual-upload" class="btn submit-btn">Upload grades to MLS</button>
</div>
<div id="error-message-modal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2>Errors With Your Grade Upload</h2>
			<hr>
			<form class="form-wide" id="update-max-form-modal">
				<div id="update-max-error-modal"></div>
				<input type="text" class="input" id="max-grade-modal" placeholder="Grade item is now out of...">
				<button type="button" id="update-max-modal" class="btn btn-success">Update maximum</button>
			</form>
			<hr>
		</div>
		<div class="modal-body">
		</div>
		<div class="modal-footer">
			<button id="resubmit" class="btn btn-success">Re-Upload</button>
			<button id="cancel-upload" class="btn btn-error">Cancel Upload</button>
		</div>
	</div>
</div>
<!-- Template HTML -->
<div class="templates">
	<p class="modal-success modal-success-template hidden"></p>
	<p class="modal-warning modal-warning-template hidden"></p>
	<p class="modal-error modal-error-template hidden"></p>
	<form class="modal-form-template form-wide hidden" id="modal-form-template">
		<h3><div id="name" class="inline"></div><button type="button" class="btn btn-error btn-remove inline remove-student-error">x</button></h3>
		<div class="form-group">
			<label>Grade: </label>
			<input type="text" name="grade" id="grade" placeholder="Enter grade">
		</div>	
		<textarea class="input" name="comment" id="comment" placeholder="Student feedback..." resize="false"></textarea>
	</form>
	<form class="upload-form upload-form-template hidden">
		<h3><div id="name" class="inline"></div><button type="button" class="btn btn-error btn-remove inline remove-student">x</button></h3>
		<div class="form-group">
			<label>Grade: </label>
			<input id="grade" name="grade" type="text" placeholder="Enter grade...">
		</div>	
		<textarea id="comment" name="comment" class="input" placeholder="Student feedback..." resize="false"></textarea>
	</form>
</div>
<script type="text/javascript" src="<?=$PATH_TO_STATIC?>/js/upload.js"></script>
<script type="text/javascript" src="<?=$PATH_TO_STATIC?>/js/jquery.easy-autocomplete.js"></script>
<script type="text/javascript" src="<?=$PATH_TO_STATIC?>/js/dynamic_search.js"></script>
<script type="text/javascript" src="<?=$PATH_TO_STATIC?>/js/upload_button.js"></script>