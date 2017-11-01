<h1>CS123 - Test Course - Lab Report 1</h1>
<h2>Out of: <strong>150</strong> marks</h2>
<hr>
<input type="text" class="input" placeholder="Grade item is now out of...">
<button class="btn btn-success">Update maximum</button>
<hr>
<h2>Automated Upload</h2>
<div class="page-section">
	<h2>Upload a File</h2>
	  <form action={{ url_for('set_grades',courseId=courseId,gradeItemId=gradeItemId) }} method="POST"
         enctype="multipart/form-data">
         	<input type="file" name="file">
          <p></p>
	  		<button class="btn" type="submit">Upload Grades File</button>
      </form>
</div>
<h2>Manual Grade Input</h2>
<div class="page-section">
	<h4>Search to add a student: </h4>
	<form>
		
		<input type="text" class="input" placeholder="Enter Student Name or ID...">
		<div class="form-checkbox">
			<input type="checkbox">
			<label class="mini">Select all</label>
		</div>
	</form>
	<hr>
	<!-- foreach student -->
	<form>
		<h3>John Doe<button class="btn btn-error btn-remove inline">x</button></h3>
		<div class="form-group">
			<label>Grade: </label>
			<input type="text" placeholder="Grade out of /100">
		</div>	
		<textarea class="input" placeholder="Student feedback..." resize="false"></textarea>

	</form>
	<form>
		<h3>Jane Doe<button class="btn btn-error btn-remove inline">x</button></h3>
		<div class="form-group">
			<label>Grade: </label>
			<input type="text" placeholder="Grade out of /100">
		</div>	
		<textarea class="input" placeholder="Student feedback..." resize="false"></textarea>

	</form>
	<button class="btn submit-btn">Upload grades to MLS</button>
</div>
<div id="change-total-modal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h3>Change grade item total</h3>
		</div>
		<div class="modal-body">
			<input type="text" class="input" placeholder="Grade item now out of...">
		</div>
		<div class="modal-footer">
			<button class="btn btn-success">Update total</button>
			<button class="btn btn-error">Cancel</button>
		</div>
	</div>
</div>
<div id="error-message-modal" class="modal">
	<div class="modal-content">
		<div class="modal-header">
			<span class="close">&times;</span>
			<h2>Errors With Your Grade Upload</h2>
			<hr>
			<input type="text" class="input" placeholder="Grade item is now out of...">
			<button class="btn btn-success">Update maximum</button>
			<hr>
		</div>
		<div class="modal-body">
			
			<form class="form-wide">
				<p class="modal-warning"><strong>WARNING: </strong>Grade greater than the <strong>maximum grade value</strong></p>
				<h3>John Doe, 1234567<button class="btn btn-error btn-remove inline">x</button></h3>
				<div class="form-group">
					<label>Grade: </label>
					<input type="text" placeholder="Grade out of /100" value="70">
				</div>	
				<textarea class="input" placeholder="Student feedback..." resize="false">Good job on A1!</textarea>
			</form>
			<form class="form-wide">
				<p class="modal-error"><strong>ERROR: </strong>Missing grade entry</strong></p>
				<h3>Jane Doe, 1234565<button class="btn btn-error btn-remove inline">x</button></h3>
				<div class="form-group">
					<label>Grade: </label>
					<input type="text" placeholder="Grade out of /100">
				</div>	
				<textarea class="input" placeholder="Student feedback..." resize="false">You need to put more effort in!</textarea>
			</form>
		</div>
		<div class="modal-footer">
			<button class="btn btn-success">Re-Upload</button>
			<button class="btn btn-error">Cancel Upload</button>
		</div>
	</div>
</div>

<script>
	window.onload = function () 
	{
		displayModal('error-message-modal', 'open-error-message');
	}
	
</script>