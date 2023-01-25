var url = null;
$(document).ready(function(){

    // function to reload Table with id reference
    function reloadTable(){
        window.location.reload();
    }

    // reset form fileds add_student
    $('#AddStudentModal').on('hidden.bs.modal', function (e) {
        // reset all fields within the modal
        $(this).find("input").val('').end()
    });

    // single student show ajax
    $('.show').on('click',function(e){

        e.preventDefault();
        alert("show");
        var show_id = $(this).data('id');
        var show_fname = $(this).data('fname');
        console.log(show_fname);
        var show_lname = $(this).data('lname');
        var show_email = $(this).data('email');
        var show_phone = $(this).data('phone');
        var show_course = $(this).data('course');

        
        $('#fname').val(show_fname);
        $('#lname').val(show_lname);
        $('#email').val(show_email);
        $('#phone').val(show_phone);
        $('#course').val(show_course);
        // console.log(show_id);
    });

    // edit student data fetching ajax
    // $(document).on('click','.edit',function(e){
    //     e.preventDefault();
    //     var edit_id = $(this).data('id');
    //     var edit_fname = $(this).data('fname');
    //     var edit_lname = $(this).data('lname');
    //     var edit_email = $(this).data('email');
    //     var edit_phone = $(this).data('phone');
    //     var edit_course = $(this).data('course');
    //     alert(edit_id);

    //     $('#student_id').val(edit_id);
    //     $('#student_fname').val(edit_fname);
    //     $('#student_lname').val(edit_lname);
    //     $('#student_email').val(edit_email);
    //     $('#student_phone').val(edit_phone);
    //     $('#student_course').val(edit_course);

    // });

    // update student data
    // if ($("#editForm").length > 0) {
    // $("#editForm").validate({
    //     rules: {
    //     fname: {
    //     required: true,
    //     },
    //     lname: {
    //     required: true,
    //     },
    //     email: {
    //     required: true,
    //     },
    //     phone: {
    //         required: true,
    //         minlength:10,
    //         maxlength:10,
    //     },
    //     course: {
    //         required: true,
    //     },
    //     },
    //     messages: {
    //     fname: {
    //     required: "Enter your first name.",
    //     },
    //     lname: {
    //     required: "Enter your last name.",
    //     },
    //     email: {
    //     required: "Enter your email address.",
    //     },
    //     phone: {
    //         required: "Enter your phone number.",
    //         minlength: "Phone number must be at least 10 digits.",
    //         maxlength: "Phone number must be 10 digits and not more.",
    //     },
    //     course: {
    //         required: "Enter your course name.",
    //     }
    //     },
    //     submitHandler: function (form) {
    //     var formData = new FormData(form);
    //     $.ajax({
    //         url: '/student/update/'+update_id,
    //         type: 'PUT',
    //         data: formData,
    //         processData: false,
    //         contentType: false,
    //         success:function(data){
    //             $('#EditModalClose').trigger('click');                
    //             reloadTable();
    //         },
    //         error:function(response){
    //             console.log(response);
    //         }
    //     });
    // }
    // })
    // }

    // delete student data (permanent)
    $(document).on('click','.delete_student',function(){
        // e.preventDefault();

        $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
        });

        var id = $('.delete').data('id');

        $.ajax({
            type: 'DELETE',
            url: '/student/delete/'+id,
            success: function(data){
                // console.log(data);
                $('#DeleteStudentClose').trigger('click');
                reloadTable();
            }
        });
    });

    // pagination ajax
    $('a').on('click', function(e){
        e.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        // console.log(page);
        fetch_data(page);

        function fetch_data(page){
            $.ajax({
                url: "/?page=" + page,
                success: function(students){
                    // console.log(students);
                    $('#app').html(students);
                }
            });;
        }
    });

    $('.add').on('click',function(){
        if (this.id == "Add") {
            url = '/student/store';
        // console.log(url);

        } else {
            var update_id = $(this).data('id');
            url = '/student/update/'+update_id;
            // console.log(url);
            var edit_id = $(this).data('id');
            var edit_fname = $(this).data('fname');
            var edit_lname = $(this).data('lname');
            var edit_email = $(this).data('email');
            var edit_phone = $(this).data('phone');
            var edit_course = $(this).data('course');
            // alert(edit_id);

            $('#student_id').val(edit_id);
            $('#student_fname').val(edit_fname);
            $('#student_lname').val(edit_lname);
            $('#student_email').val(edit_email);
            $('#student_phone').val(edit_phone);
            $('#student_course').val(edit_course);
        }
    });
    // console.log(url);

    // add student ajax with jquery validation
    if ($("#addForm").length > 0) {
        $("#addForm").validate({
         rules: {
         fname: {
         required: true,
         },
         lname: {
         required: true,
         },
         email: {
         required: true,
         },
         phone: {
             required: true,
             minlength:10,
             maxlength:10,
         },
         course: {
             required: true,
         },
         },
         messages: {
         fname: {
         required: "Enter your first name.",
         },
         lname: {
         required: "Enter your last name.",
         },
         email: {
         required: "Enter your email address.",
         },
         phone: {
             required: "Enter your phone number.",
             minlength: "Phone number must be at least 10 digits.",
             maxlength: "Phone number must be 10 digits and not more.",
         },
         course: {
             required: "Enter your course name.",
         }
         },
         submitHandler: function (form,e) {
            // e.preventDefault();
            // console.log($('button').hasClass('add'));
            
            var formData = new FormData(form);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success:function(data){
                    // console.log(data);
                    $('#AddStudentClose').trigger('click');
                    reloadTable();
                },
                error:function(){
                    // console.log(response.responseJSON.errors.fname);
                    // $('#NameError').html(response.responseJSON.errors.fname)
                }
            });
        }
         })
    } 

});





 





 



