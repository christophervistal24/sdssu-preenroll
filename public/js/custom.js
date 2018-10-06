/* INSTRUCTOR FIELDS */
let instructorId            = document.querySelector('#instructorId');
let instructorFullname      = document.querySelector('#instructorFullname');
let instructorIdNumber      = document.querySelector('#instructorIdNumber');
let instructorEducationQual = document.querySelector('#instructorEducationQual');
let instructorPosition      = document.querySelector('#instructorPosition');
let instructorStatus        = document.querySelector('#instructorStatus');
let instructorIsActive      = document.querySelector('#instructorIsActive');
let saveChangesForIns = document.querySelector('#editInstructorSave');
/* END OF INSTRUCTOR FIELDS*/
/* SCHEDULE FIELDS */
let scheduleId = document.querySelector('#scheduleId');
let starTime   = document.querySelector('#startTime');
let endTime    = document.querySelector('#endTime');
let days       = document.querySelector('#days');
let room       = document.querySelector('#room');
let instructor = document.querySelector('#instructor');
let first_year_first_sem   = document.querySelector('#subject_1_1');
let first_year_second_sem  = document.querySelector('#subject_1_2');
let second_year_first_sem  = document.querySelector('#subject_2_1');
let second_year_second_sem = document.querySelector('#subject_2_2');
let third_year_first_sem   = document.querySelector('#subject_3_1');
let third_year_second_sem  = document.querySelector('#subject_3_2');
let third_year_summer      = document.querySelector('#subject_3');
let fourth_year_first_sem  = document.querySelector('#subject_4_1');
let fourth_year_second_sem = document.querySelector('#subject_4_2');
let selectedSubject = null;
/* END OF SCHEDULE FIELDS */
let token = document.querySelector('meta[name="csrf-token"]').content;
let table = $('#tables').DataTable();

let ucwords = (str) => {
    return (str + '').replace(/^([a-z])|\s+([a-z])/g,  ($1) => {
        return $1.toUpperCase();
    });
};

let checkValueInSubjects = (element,value) => {
  let i;
    for (i = 0; i < element.length; i++) {
      if (value == element[i].value) {
        return element.id;
      }
    }
    return false;
};

let findElement = (data) => {
      const subject1 = document.querySelector('#'+checkValueInSubjects(first_year_second_sem,data));
      const subject2 = document.querySelector('#'+checkValueInSubjects(second_year_first_sem,data));
      const subject3 = document.querySelector('#'+checkValueInSubjects(second_year_second_sem,data));
      const subject4 = document.querySelector('#'+checkValueInSubjects(third_year_first_sem,data));
      const subject5 = document.querySelector('#'+checkValueInSubjects(third_year_second_sem,data));
      const subject6 = document.querySelector('#'+checkValueInSubjects(third_year_summer,data));
      const subject7 = document.querySelector('#'+checkValueInSubjects(fourth_year_first_sem,data));
      const subject8 = document.querySelector('#'+checkValueInSubjects(fourth_year_second_sem,data));
      const subject9 = document.querySelector('#'+checkValueInSubjects(first_year_first_sem,data));
      check = [subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8,subject9];
      let find = [];
      for(i = 0; i<check.length; i++)
      {
          if (check[i] != null) {
              return check[i];
          }
      }
};

let displayEditModal = (id) => {
	$('#editInstructor').modal('toggle');
	instructorId.value = id;
	fetch(`/admin/instructorinfo/${id}`)
	  	.then((res) => res.json())
	  	.then((data) => {
           instructorFullname.value = ucwords(data.name);
           instructorIdNumber.value = ucwords(data.id_number);
           instructorEducationQual.value = data.education_qualification.toUpperCase();
           instructorPosition.value = ucwords(data.position);
           instructorStatus.value = data.status;
           instructorIsActive.value = (data.active == 1) ? 'Active' : 'In Active';
        });
};

let displayEditSchedule = (schedule_id) => {
  document.querySelector('#scheduleForm').reset();
  $('#editSchedule').modal('toggle');
  fetch(`/admin/getscheduleinfo/${schedule_id}`)
      .then((res) => res.json())
      .then((data) => {
          scheduleId.value                = data.id,
          starTime.value                  = data.start_time,
          endTime.value                   = data.end_time,
          instructor.value                = data.instructor,
          room.value                      = data.room,
          days.value                      = data.days,
          findElement(data.subject).value = data.subject
      });
};

let submitSchedule = () => {
  fetch(`/admin/updatescheduleinfo/${scheduleId.value}`,{
              method: 'POST',
              body: JSON.stringify({
                 _token:token,
                 id:scheduleId.value,
                 start_time:starTime.value,
                 end_time:endTime.value,
                 instructor:instructor.value,
                 days:days.value,
                 room:room.value,
                 subject:getNewSubject()
             }),
              headers: new Headers({ "Content-Type": "application/json" })
            })
            .then((res) => res.json())
            .then((data) =>{
                if (data.success == true) {
                    $('#editSchedule').modal('toggle');
                    swal("Good job!", `Please wait a couple of seconds to apply some changes`, "success")
                      .then(() => {
                        location.replace('/admin/schedule');
                      });
                }
            })
};

let getNewSubject = () => {
  if (first_year_first_sem.value != first_year_first_sem.options[0].value) {
      return first_year_first_sem.value;
  }
  if (first_year_second_sem.value != first_year_second_sem.options[0].value) {
    return first_year_second_sem.value;
  }
  if (second_year_first_sem.value != second_year_first_sem.options[0].value) {
    return second_year_first_sem.value;
  }
  if (second_year_second_sem.value != second_year_second_sem.options[0].value) {
    return second_year_second_sem.value;
  }
  if (third_year_first_sem.value != third_year_first_sem.options[0].value) {
    return third_year_first_sem.value;
  }
  if (third_year_second_sem.value != third_year_second_sem.options[0].value) {
    return third_year_second_sem.value;
  }
  if(third_year_summer.value!= third_year_summer.options[0].value) {
    return third_year_second_sem.value;
  }
  if (fourth_year_first_sem.value != fourth_year_second_sem.options[0].value) {
    return fourth_year_first_sem.value;
  }
  if (fourth_year_second_sem.value != fourth_year_second_sem.options[0].value) {
    return fourth_year_second_sem.value;
  }
};

let submitInstructorInfo = () => {
    fetch(`/admin/instructorinfo/${instructorId.value}`,{
              method: 'POST',
              body: JSON.stringify({
                 _token:token,
                 name:instructorFullname.value,
                 id_number:instructorIdNumber.value,
                 education_qualification:instructorEducationQual.value,
                 position:instructorPosition.value,
                 status:instructorStatus.value,
                 active:(instructorIsActive.value == 'Active') ? 1 : 0
             }),
              headers: new Headers({ "Content-Type": "application/json" })
            })
            .then((res) => res.json())
            .then((data) =>{
                if (data.success == true) {
                    $('#editInstructor').modal('toggle');
                    swal("Good job!", `Please wait a couple of seconds for applying some changes to ${instructorFullname.value}`, "success")
                      .then(() => {
                        location.replace('/admin/instructors');
                      });
                }
            })
};






