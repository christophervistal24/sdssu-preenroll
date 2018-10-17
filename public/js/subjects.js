/* FIELDS */
let subjectId       = document.querySelector('#subjectId');
let subjectCode     = document.querySelector('#subjectCode');
let subjectDesc     = document.querySelector('#subjectDesc');
let subjectUnits    = document.querySelector('#subjectUnits');
let subjectYear     = document.querySelector('#subjectYear');
let subjectPre      = document.querySelector('#subjectPre');
let subjectSemester = document.querySelector('#subjectSemester');
let token      = document.querySelector('meta[name="csrf-token"]').content;


let editSubjectModal = (subject_info) => {
	$('#subjectModal').modal('toggle');
	document.querySelector('#btnSave')
			.innerHTML = 'Save changes';
	document.querySelector('#subjectTitle')
			.innerHTML = 'Edit ' + subject_info.subject_sub;
	subjectId.value       = subject_info.subject_id;
	subjectCode.value     = subject_info.subject_sub;
	subjectDesc.value     = subject_info.subject_description;
	subjectUnits.value    = subject_info.subject_units;
	subjectPre.value      = subject_info.subject_prereq;
	subjectYear.value     = subject_info.subject_year;
	subjectSemester.value = subject_info.subject_semester;
};

let addSubjectModal = (subject_info) => {
	document.querySelector('#subjectForm').reset();
	$('#subjectModal').modal('toggle');
	document.querySelector('#btnSave')
			.innerHTML = 'Create';
	document.querySelector('#subjectTitle')
			.innerHTML = 'Add new subject';
};

let createOrUpdateSubject = () => {
	if (subjectPre.value == 'Pre-req') {
		subjectPre.value = '';
	}
	if (subjectId.value == 0) {
			 fetch(`/admin/subjectcreate`,{
              method: 'POST',
              body: JSON.stringify({
            	_token: token,
		      	subject_description: subjectDesc.value,
				subject_id: subjectId.value,
				subject_prereq: subjectPre.value,
				subject_semester: subjectSemester.value,
				subject_sub: subjectCode.value,
				subject_units: subjectUnits.value,
				subject_year: subjectYear.value
             }),
              headers: new Headers({ "Content-Type": "application/json" })
            }).then((res) => res.json())
	  	      .then((data) => {
           	
        	  });
		} else {
			fetch('/admin/subjectcreate',{
		      method: 'POST',
		      body: JSON.stringify({
		      	_token: token,
		      	subject_description: subjectDesc.value,
				subject_id: subjectId.value,
				subject_prereq: subjectPre.value,
				subject_semester: subjectSemester.value,
				subject_sub: subjectCode.value,
				subject_units: subjectUnits.value,
				subject_year: subjectYear.value
		      }),
		      headers: new Headers({ "Content-Type": "application/json" })
		    }).then((res) => res.json())
		      .then((data) => {
	     
	          });
		}


	      location.reload();
};
