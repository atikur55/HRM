

$(function() {

    /*
    =========================================
    |                                       |
    |          Variables Definations        |
    |                                       |
    =========================================
    */
   var taskrandomid = 'i am null';
   var checktaskrandomid = 'i am null';
   let globalajaxdata = 'i am globalajaxdata';
   
   var editkey = 1;

 /*
    =========================================
    |                                       |
    |          Ajax call    |
    |                                       |
    =========================================
    */

    /* show data */

function $_sweet_alert($msg){
         const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                        });
                        
                        toast({
                        type: 'success',
                        title: $msg,
                        padding: '2em',
                        })
}

   function showtaskajax(){

    $.ajaxSetup({   
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    var root_url = '/showtaskajax';
    var globalprojectid = $("#globalprojectid").val();
     
    $.ajax({
        url: root_url,
        type:'GET',
    	data: {'project_id':globalprojectid }
	}).done(function(data){
       
        show_tasks(data)
	});
   }

   /* store data */
   function taskajax(args){
    
    // return new Promise  (function(done) {
    //     // emulate async call with setTimeout
    //     setTimeout(function() {
    //       console.log("1");

                /* ajax function code */

                    
    const objectArray = Object.entries(args);
    let formData = {
        title: 'formdata',
    };
    objectArray.forEach(([key, value]) => {
      console.log(key+' = '+value); 
      formData[key] = value;
   
    });

    $.ajaxSetup({   
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var type = "POST";
    var ajaxurl = '/storetask';
   
    

    $.ajax({
        type: type,
        url: ajaxurl,
        data: formData,
        dataType: 'json',
        async:false,
    
        success: function (data) {

           console.log('inside ajax function = '+data._task);
            // return 'I am from ajax';
           globalajaxdata = data;
          location.reload(); 

        },
        error: function (data) {
            console.log(data);
        }
    });


                 



            //       done();
            //     });
            //   });
}


   /* draggable ajax */
   function draggable_ajax(parent_ui,task_id,data_order_id){
       console.log('inside func = '+parent_ui);
   $.ajaxSetup({   
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var type = "POST";
    var ajaxurl = '/update_draggable_status';
   
    data = {
        'parent_ui':parent_ui,
        'task_id':task_id,
        'data_order_id':data_order_id

    }

    $.ajax({
        type: type,
        url: ajaxurl,
        data: data,
        dataType: 'json',
        async:false,
    
        success: function (data) {

        //    console.log('inside drag ajax function = '+Object.entries(data));
           console.log('inside drag ajax function = '+data);
            // return 'I am from ajax';
             if(data){
                 $msg = data;
                 $_sweet_alert($msg);
               
                }

        },
        error: function (data) {
            console.log(data);
        }
    });

   }



   function $_task_ajax_delete($_taskId){
       $.ajaxSetup({   
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var type = "POST";
    var ajaxurl = '/task_ajax_delete';
   
    data = {
        'task_id':$_taskId

    }

    $.ajax({
        type: type,
        url: ajaxurl,
        data: data,
        dataType: 'json',
        async:false,
    
        success: function (data) {

        //    console.log('inside drag ajax function = '+Object.entries(data));
           console.log('inside delete function = '+data);
            // return 'I am from ajax';
             if(data){
                 $msg = data;
                 $_sweet_alert($msg);
               
                }

        },
        error: function (data) {
            console.log(data);
        }
    });

   }

       /* ====== ajax function code end=== */

     /*
    =========================================
    |                                       |
    |          function call call    |
    |                                       |
    =========================================
    */

function task_assign_to_loop(d){
    s = d.split("+");
    r = '';
    for(var i=0; i<s.length ;i++)
    { r=r+'<span class="sassignto badge badge-pills badge-primary ml-2 mt-2">'+s[i]+'</span>';}
    return r;
}

   function makeid(length) {
    var resultid           = '';
    var charactersid       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    var charactersLength = charactersid.length;
    for ( var i = 0; i < length; i++ ) {
       resultid += charactersid.charAt(Math.floor(Math.random() * charactersLength));
    }
    return resultid;
 }
 
//  taskrandomid = console.log(makeid(8));

    console.log('found');


       /*
    =========================================
    |                                       |
    | Main code    |
    |                                       |
    =========================================
    */
    var Container = {
        scrumboard: $('.scrumboard'),
        card: $('.scrumboard .card')
    }

    // Containers
    var scrumboard = Container.scrumboard;
    var card = Container.card;


    // Make Task Sortable

    function $_taskSortable() {
        // var parent_ui;
        $('[data-sortable="true"]').sortable({
            connectWith: '.connect-sorting-content',
            items: ".card",
            cursor: 'move',
            placeholder: "ui-state-highlight",
            refreshPosition: true,
            stop: function( event, ui ) {
                var parent_ui = ui.item.parent().attr('data-section-s');
                var data_task_id = ui.item.attr('data-task-id');
                console.log('i am stopped');
                console.log(ui);
                 console.log(ui.item);

                    let order = {};
                        $('.task-text-progress').each(function() {
                            console.log('loop parent == '+parent_ui+' found = '+$(this).parent().attr('data-section-s'))
                            if(parent_ui == $(this).parent().attr('data-section-s')){

                                order[$(this).attr('data-task-id')] = $(this).index();
                            }
                            
                        });
                        console.log(order);
                        data_order_id = order;

                     let order2 = {};
                       ui.item.each(function() {
                            order2[$(this).attr('data-task-id')] = $(this).index();
                            
                        });
                        console.log(order2);

                       

                //  $(ui.childNodes).each(function () {
                // console.log("FW: " + $(this).attr("data-task-id") + ", : task-order" +$(this).attr("data-task-order"));
                // //             });
                // var c = ui.item;
                // var txt = '';
                //  for (i = 0; i < c.length; i++) {
                //         txt = txt + c[i] + $(this).index()+' , ';
                //     }
                //     console.log('child node = '+txt);

                 console.log('---./ i am stopped----');
                
                /* draggable ajax */
                draggable_ajax(parent_ui,data_task_id,data_order_id);

            },
            update: function( event, ui ) {
                console.log('i am updated');
                console.log(ui);
                console.log(ui.item);
                console.log('---./i am updated----');
          
            }
        });
    }


    // show task

    function show_tasks(data){

        

        /* show task parent code */
        event.preventDefault();
        var getParentElement = $(this).parents('[data-connect="sorting"]').attr('data-section');
        console.log('show task parent '+getParentElement);
        if(getParentElement == undefined) getParentElement = 's-todo';
  
            // getAddBtnClass = $(this).attr('class').split(' ')[1];

              var today = new Date();
              var dd = String(today.getDate()).padStart(2, '0');
              var mm = String(today.getMonth()); //January is 0!
              var yyyy = today.getFullYear();

              var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];

              today = dd + ' ' + monthNames[mm] + ', ' + yyyy;

                // var $_getParent = getParentElement;

     
      

        for(i = 0;i<data.length;i++){
            // console.log('status = '+data[i].task_status)
            // console.log(Object.entries(data[i]))
            
            if(data[i].task_status == 'todo')
                 getParentElement = 's-todo';
        else if(data[i].task_status == 'inprogress')
                 getParentElement = 's-inprogress';
        else if(data[i].task_status == 'complete')
             getParentElement = 's-complete';
             var $_getParent = getParentElement;

            //  var res = data[i].task_assign_to.split(" ");

            $html = '<div data-task-id="'+
                data[i].id
            +'" data-task-order="'+
                i
            +'"data-saad-order="'+
                i
            +'" data-draggable="true" class="card task-text-progress" style="">'+
            '<div class="card-body">'+

                '<div class="task-header">'+
               
                    '<div class="">'+
                        '<h4 class="" data-taskTitle="'+ data[i].task_name +'" title-data-task-id="'+
                data[i].id
            +'" >'+ data[i].task_name +'</h4>'+
                    '</div>'+
                    
                    '<div class="">'+
                        '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>'+
                    '</div>'+

                '</div>'+

                '<div class="task-body">'+

                    '<div class="task-content">'+
                        '<p class="desc" data-taskText="'+data[i].task_description +'">'+ data[i].task_description +'</p>'+

                        
                        '<p class="passignto" data-assignto="'+data[i].task_assign_to +'">'+
                        '<i class="fa fa-user"></i>'

                        + task_assign_to_loop(data[i].task_assign_to) +
                        '</p>'+   
                        
                        '<p class="pdate"'+
                         'data-startdate="'+data[i].task_start_date+
                         '"data-enddate="'+data[i].task_end_date+'" >'
                        +
                            '<span class="sstartdate badge badge-classic badge-info" data-startdate="'+data[i].task_start_date+'">'+data[i].task_start_date+
                            '</span>'+
                            'to'+
                            '<span class="senddate badge badge-classic badge-danger" data-enddate="'+data[i].task_end_date+'">'+data[i].task_end_date+
                            '</span>'+
                        '</p>'+

                       ' <p class="ppriority" data-priority="'+data[i].task_priority+'">'+
                            'Priority:' +
                        '<span class=" spriority badge badge-primary">'+
                        data[i].task_priority+
                        '</span>'+
                        '</p>'+

                    '</div>'+

                    '<div class="task-bottom">'+
                        '<div class="tb-section-1">'+
                            '<span class="screateddate"  data-taskDate="'+today+'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> '+today+'</span>'+
                        '</div>'+
                        '<div class="tb-section-2">'+
                            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 s-task-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>'+
                        '</div>'+
                    '</div>'+
                    
                '</div>'+

            '</div>'+
        '</div>';

$("[data-section='"+$_getParent+"'] .connect-sorting-content").append($html); 



$('#addTaskModal').modal('hide');


        }
        // console.log('inside show task = '+data);




$_taskEdit();
$_taskDelete();
// console.log('inside show = '+$_getParent);
$_taskSortable();
$_editList();
$_deleteList();
$_clearList();
addTask();


    }



    // Click on Add Task button to open the modal and more..

    var vals = null;
    var taskuservals = null;


    function addTask() {
        $('.addTask').on('click', function(event) {
            
            editkey = 1;

            var $checkes = $('input:checkbox[name="task_assign_to[]"]').change(function () {
                var vals = $checkes.filter(':checked').map(function () {
                    return this.value;
                }).get();
                console.log(vals);
                taskuservals = vals;
                // alert(JSON.stringify(vals));
                // var $_assignTo = taskarr['_assignTo'] = JSON.stringify(vals);
            });
            // console.log(vals);
            // var $_assignTo = taskarr['_assignTo'] = JSON.stringify(vals);
            // var $_assignTo  = JSON.stringify(vals);
            // console.log('assign to = '+$_assignTo);




            event.preventDefault();
            getParentElement = $(this).parents('[data-connect="sorting"]').attr('data-section');
            console.log('parent '+getParentElement);
            if(getParentElement == undefined) getParentElement = 's-todo';
            $('.edit-task-title').hide();
            $('.add-task-title').show();
            $('[data-btnfn="addTask"]').show();
            $('[data-btnfn="editTask"]').hide();
            $('.addTaskAccordion .collapse').collapse('hide');
            $('#addTaskModal').modal('show');
            $_taskAdd(getParentElement);
        });




    }

    // Get the range count value

    $('#progress-range-counter').on('input', function(event) {
        event.preventDefault();
        /* Act on the event */
        getRangeValue = $(this).val();
        $('.range-count-number').html(getRangeValue);
        $('.range-count-number').attr('data-rangeCountNumber', getRangeValue);
    });

    // Reset the input Values

    // $('#addTaskModal, #addListModal').on('hidden.bs.modal', function (e) {
    //     $('input,textarea').val('');
    //     $('input[type="range"]').val(0);
    //     $('.range-count-number').attr('data-rangecountnumber', 0);
    //     $('.range-count-number').html(0);
    // })

    // change the modal Button class on accordion open 

    // $('.addTaskAccordion .collapse').on('shown.bs.collapse', function () {

    //     getClassOfAccordion = $(this).parents('.card').attr('class').split(' ')[1];
    //     getClassOfAddTaskBtn = $(this).parents('.modal-content').find('[data-btnfn="addTask"]').attr('class').split(' ')[1];
    //     removeClassOfAddTaskBtn = $(this).parents('.modal-content').find('[data-btnfn="addTask"]').removeClass(getClassOfAddTaskBtn);
    //     var addClassInAddTaskBtn;

    //     if (getClassOfAccordion === 'task-simple') {
    //         addClassInAddTaskBtn = $(this).parents('.modal-content').find('[data-btnfn="addTask"]').addClass('task-simple');
    //     }
    //     if (getClassOfAccordion === 'task-text-progress') {
    //         addClassInAddTaskBtn = $(this).parents('.modal-content').find('[data-btnfn="addTask"]').addClass('task-text-progress');
    //     } else if (getClassOfAccordion === 'task-checkbox') {
    //         addClassInAddTaskBtn = $(this).parents('.modal-content').find('[data-btnfn="addTask"]').addClass('task-checkbox');
    //     } else if (getClassOfAccordion === 'task-image') {
    //         addClassInAddTaskBtn = $(this).parents('.modal-content').find('[data-btnfn="addTask"]').addClass('task-image');
    //     }
    // })

    function $_taskAdd( getParent ) {

        $('[data-btnfn="addTask"]').off('click').on('click', function(event) {
      
            const taskarr = [];
            
            getAddBtnClass = $(this).attr('class').split(' ')[1];

              var today = new Date();
              var dd = String(today.getDate()).padStart(2, '0');
              var mm = String(today.getMonth()); //January is 0!
              var yyyy = today.getFullYear();

              var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec" ];

              today = dd + ' ' + monthNames[mm] + ', ' + yyyy;

                var $_getParent = getParent;

            
                taskrandomid = makeid(5);
                var $_taskid =  taskarr['_taskid'] =  taskrandomid;
                console.log('task id = '+taskrandomid);
                
                var $_projectid =  taskarr['_projectid'] = document.getElementById('s-projectid').value;
                var $_task =  taskarr['_task'] = document.getElementById('s-task').value;
                var $_taskText = taskarr['_taskText'] =  document.getElementById('s-text').value;
                /* assign to*/
               
                console.log('in aaaa taskuservals taskuservals= '+taskuservals)
                var $_assignTo = taskarr['_assignTo'] = taskuservals;
                /* assign to end */
                var $_startDate =taskarr['_startDate'] =  document.getElementById('s-startdate').value;
                var $_endDate = taskarr['_endDate'] = document.getElementById('s-enddate').value;

                var $_priority =taskarr['_priority'] =  document.getElementById('s-priority').value;
                var $_status =taskarr['_status'] =  document.getElementById('s-status').value;
               
                
               console.log('after add = '+taskarr['_task']);
             
               taskajax(taskarr);
               showtaskajax();


                console.log('Outside ajax fun = '+globalajaxdata);
                if(globalajaxdata){
                    const toast = swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000,
                        padding: '2em'
                        });
                        
                        toast({
                        type: 'success',
                        title: globalajaxdata,
                        padding: '2em',
                        })
                }
                                  
  
//var $_taskProgress = $('.range-count-number').attr('data-rangeCountNumber');

                    // $html = '<div data-draggable="true" class="card task-text-progress" style="">'+
                    //             '<div class="card-body">'+

                    //                 '<div class="task-header">'+
                                   
                    //                     '<div class="">'+
                    //                         '<h4 class="" data-taskTitle="'+ $_task +'">'+ $_task +'</h4>'+
                    //                     '</div>'+
                                        
                    //                     '<div class="">'+
                    //                         '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 s-task-edit"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg>'+
                    //                     '</div>'+

                    //                 '</div>'+

                    //                 '<div class="task-body">'+

                    //                     '<div class="task-content">'+
                    //                         '<p class="desc" data-taskText="'+ $_taskText +'">'+ $_taskText +'</p>'+

                                            
                    //                         '<p class="passignto" data-assignto="Arif,Sumon">'+
                    //                         '<i class="fa fa-user"></i>'+
                    //                         '<span class="sassignto badge badge-pills badge-primary">'+
                    //                            'Arif' +
                    //                         '</span>'+
                    //                         '<span class="sassignto badge badge-pills badge-primary">'+
                    //                            ' Sumon'+
                    //                         '</span> '+
                    //                         '</p>'+   
                                            
                    //                         '<p class="pdate"'+
                    //                          'data-startdate="'+$_startDate+
                    //                          '"data-enddate="'+$_startDate+'" >'
                    //                         +
                    //                             '<span class="sstartdate badge badge-classic badge-info" data-startdate="'+$_startDate+'">'+$_startDate+
                    //                             '</span>'+
                    //                             'to'+
                    //                             '<span class="senddate badge badge-classic badge-danger" data-enddate="'+$_endDate+'">'+$_endDate+
                    //                             '</span>'+
                    //                         '</p>'+

                    //                        ' <p class="ppriority" data-priority="'+$_priority +'">'+
                    //                             'Priority:' +
                    //                         '<span class=" spriority badge badge-primary">'+
                    //                             $_priority+
                    //                         '</span>'+
                    //                         '</p>'+

                    //                     '</div>'+

                    //                     '<div class="task-bottom">'+
                    //                         '<div class="tb-section-1">'+
                    //                             '<span class="screateddate"  data-taskDate="'+today+'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> '+today+'</span>'+
                    //                         '</div>'+
                    //                         '<div class="tb-section-2">'+
                    //                             '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 s-task-delete"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>'+
                    //                         '</div>'+
                    //                     '</div>'+
                                        
                    //                 '</div>'+

                    //             '</div>'+
                    //         '</div>';

                // $("[data-section='"+$_getParent+"'] .connect-sorting-content").append($html); 

            

            $('#addTaskModal').modal('hide');

            // $_taskEdit();
            // $_taskDelete();
        });
    }

    $("#add-list").off('click').on('click', function(event) {
      event.preventDefault();

        $('.add-list').show();
        $('.edit-list').hide();
        $('.edit-list-title').hide();
        $('.add-list-title').show();
        $('#addListModal').modal('show');
    });

    $(".add-list").off('click').on('click', function(event) {
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '.' + dd + '.' + yyyy;

        var $_listTitle = document.getElementById('s-list-name').value;

        var $_listTitleLower = $_listTitle.toLowerCase();
        var $_listTitleRemoveWhiteSpaces = $_listTitleLower.split(' ').join('_') ;
        var $_listSectionDataAttr = $_listTitleRemoveWhiteSpaces;


        $html = '<div data-section="s-'+$_listSectionDataAttr+'" class="task-list-container  mb-4 " data-connect="sorting">'+
                    '<div class="connect-sorting">'+
                        '<div class="task-container-header">'+
                            '<h6 class="s-heading" data-listTitle="'+$_listTitle+'">'+$_listTitle+'</h6>'+
                            '<div class="dropdown">'+
                                '<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-4" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">'+
                                    '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>'+
                                '</a>'+
                                '<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink-4">'+
                                    '<a class="dropdown-item list-edit" href="javascript:void(0);">Edit</a>'+
                                    '<a class="dropdown-item list-delete" href="javascript:void(0);">Delete</a>'+
                                    '<a class="dropdown-item list-clear-all" href="javascript:void(0);">Clear All</a>'+
                                '</div>'+
                            '</div>'+
                        '</div>'+

                        '<div class="connect-sorting-content" data-sortable="true">'+
                            
                            
                        '</div>'+

                        '<div class="add-s-task">'+
                            '<a class="addTask"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg> Add Task</a>'+
                        '</div>'+

                    '</div>'+
                '</div>';

        $(".task-list-section").append($html); 
        $('#addListModal').modal('hide');
        $('#s-list-name').val('');
        // $_taskSortable();
        $_editList();
        $_deleteList();
        $_clearList();
        addTask();
        $_taskEdit();
        $_taskDelete();
    })

    // Delete the whole list including tasks at on click

    function $_deleteList() {
        $('.list-delete').off('click').on('click', function(event) {
            event.preventDefault();
            $(this).parents('[data-connect]').remove();
        })
    }
    function $_editList() {
        $('.list-edit').off('click').on('click', function(event) {

            event.preventDefault();

            var $_outerThis = $(this);
           
            $('.add-list').hide();
            $('.edit-list').show();

            $('.add-list-title').hide();
            $('.edit-list-title').show();

            var $_listTitle = $_outerThis.parents('[data-connect="sorting"]').find('.s-heading').attr('data-listTitle');
            $('#s-list-name').val($_listTitle);

            $('.edit-list').off('click').on('click', function(event) {
                var $_innerThis = $(this);
                var $_getListTitle = document.getElementById('s-list-name').value;

                var $_editedListTitle = $_outerThis.parents('[data-connect="sorting"]').find('.s-heading').html($_getListTitle);
                var $_editedListTitleDataAttr = $_outerThis.parents('[data-connect="sorting"]').find('.s-heading').attr('data-listTitle', $_getListTitle);

                $('#addListModal').modal('hide');
                $('#s-list-name').val('');
            })
            $('#addListModal').modal('show');
            $('#addListModal').on('hidden.bs.modal', function (e) {
                $('#s-list-name').val('');
            })
        })
    }

    // Clear all task at on click

    function $_clearList() {
        $('.list-clear-all').off('click').on('click', function(event) {
            event.preventDefault();
            $(this).parents('[data-connect="sorting"]').find('.connect-sorting-content .card').remove();
        })
    }

    // Delete the task on click 

    function $_taskDelete() {
        $('.card .s-task-delete').off('click').on('click', function(event) {
            event.preventDefault();

            get_card_parent = $(this).parents('.card');

            console.log('delete parent = '+Object.values(get_card_parent));
            $('#deleteConformation').modal('show');

            $('[data-remove="task"]').on('click', function(event) {
                event.preventDefault();
                /* Act on the event */


            var $_taskId = get_card_parent.find('h4').attr('title-data-task-id');
            console.log('delete parent = '+$_taskId);

            $_task_ajax_delete($_taskId);
                get_card_parent.remove();


                $('#deleteConformation').modal('hide');
            });

        })
    }


var $_taskId='';
    function $_taskEdit() {
      $('.card .s-task-edit').off('click').on('click', function(event) {
        editkey = 2;
        event.preventDefault();

        var $_outerThis = $(this);
       
        $('.add-task-title').hide();
        $('.edit-task-title').show();

        $('[data-btnfn="addTask"]').hide();
        $('[data-btnfn="editTask"]').show();
        
        /* task id */
           get_card_parent = $(this).parents('.card');
    $_taskId = $_outerThis.parents('.card').find('h4').attr('title-data-task-id');
           console.log('_taskId = '+$_taskId);


/* title */
          var $_taskTitle = $_outerThis.parents('.card').find('h4').attr('data-taskTitle');
            var get_value_title = $('#s-task').val($_taskTitle);
            console.log('_taskTitle = '+$_taskTitle);

            /* desc */
            var $_taskText = $_outerThis.parents('.card').find('p:not(".progress-count, .passignto,.pdate,.ppriority")').attr('data-taskText');
            var get_value_text = $('#s-text').val($_taskText);

                 /* Task Assign To */
               var $_assignTo = $_outerThis.parents('.card').find('p:not(".desc,.pdate,.ppriority")').attr('data-assignto');
               console.log('ass = '+$_assignTo);
                var ass = new Array();
              ass = $_assignTo.split("+");
            //    var get_value_assignTo = $('#s-assignto').val($_assignTo);
               
            //    document.getElementById("checkbox").checked = true;

            //   var checkedValue = null; 
            //      var inputElements = $("input:checkbox:not(:checked)");
            //      console.log('inputElements = ');
            //       console.log(inputElements);
            //     for(var i=0; i<ass.length; i++){
            //         if(inputElements[i] == ass[i]){
            //             checkedValue = inputElements[i].checked;
            //             //break;
            //         }
            //     }
            

            var i = 0;
              var v =[];
                var r=[];
        for(i=0;i<ass.length;i++){
          
            r = ass[i].split("_");
            v[i]=r[0];
        }
        console.log('ass: '+ass.length+' v = '+v);
        // v.map(function(num){
        //                 if(num)
        //                 $('input:checkbox[value="' + num + '"]').attr('checked', true);
                       
        //         })

var c = 0;
      
               $("input:checkbox").map(function (val) {

                        console.log("val: " +val);
                        console.log("Id: " + $(this).attr("id") + " Value: " + $(this).val());
                        
  console.log("============================ " );
                   
                
                    if($(this).val() === v[c]){
                       
                        $(this).prop("checked", true);
                        c++;
                    }else{
                        $(this).prop("checked", false);
                    }
                  
  console.log("=================END====================== " );

        });




//                $("input:checkbox:not(:checked)").each(function () {

//                         // console.log("ass: " + ass[i]+' type '+typeof(ass));
//                         // console.log("Id: " + $(this).attr("id") + " Value: " + $(this).val());
//                         var v = [];
                        
//   console.log("============================ " );
//                     if(ass[i]=== undefined){v=[]}
//                     else{
//                         v = ass[i++].split("_")
//                         console.log("v: " + v[0]+' type '+typeof(v));
//                         console.log("INSIDE === Id: " + $(this).attr("id") + " Value: " + $(this).val());
//                         };
                
//                     if($(this).val() == v[0]){
                       
//                         $(this).prop("checked", true);
//                     }
//                      console.log("=================END====================== " );

//         });
      

            //   $('#s-assignto').change(function(){
            //     if($(this).attr('checked')){
            //         $(this).val('TRUE');
            //     }else{
            //         $(this).val('FALSE');
            //     }
            // });


            //    var checkedValue = null; 
            //     var inputElements = document.getElementsByClassName('task_assign_to');
            //     for(var i=0; inputElements[i]; ++i){
            //         if(inputElements[i].checked){
            //             checkedValue = inputElements[i].value;
            //             break;
            //         }
            //     }

        
             
                  

               /* Task Start date */
                if(editkey == 2){
                       $("#s-startdate").attr("type","text");
                $("#s-enddate").attr("type","text");
                }

             

               var $_startDate = $_outerThis.parents('.card').find('p:not(".progress-count, .passignto,.desc,.ppriority")').attr('data-startdate');
               console.log('_startDate = '+$_startDate);
               var get_value_startDate = $('#s-startdate').val($_startDate);

               /* Task End date */
               var $_endDate = $_outerThis.parents('.card').find('p:not(".progress-count, .passignto,.desc,.ppriority")').attr('data-enddate');
               console.log('_endDate = '+$_endDate);
              
               var get_value_endDate = $('#s-enddate').val($_endDate);

                   /* Priority */
                  var selected = document.getElementById("s-priority");
                  var $_priority = selected.value;
                //  var $_assignTo = $_outerThis.parents('.card').find('p:not(".desc,.pdate,.ppriority")').attr('data-assignto');
                   var $_priority = $_outerThis.parents('.card').find('p:not(".progress-count, .passignto,.desc,.passignto,.pdate")').attr('data-priority');
                   console.log('_priority = '+$_priority);
                //    var get_value_priority = $('.task-text-progress #s-priority').val($_priority);
                   document.getElementById("s-priority").value = $_priority;


            $('.task-text-progress .collapse').collapse('show');
        







/* After click update action button */

        $('[data-btnfn="editTask"]').off('click').on('click', function(event) {

            // $_update_ajax();

            var $_innerThis = $(this);

           
                var $_taskValue = document.getElementById('s-task').value;
                console.log('_taskValue = '+$_taskValue);
                var $_taskTextValue = document.getElementById('s-text').value;
                console.log('_taskTextValue = '+$_taskTextValue);



                // var $_assignToValue = document.getElementById('s-assignto').value;
                // console.log('_assignToValue = '+$_assignToValue);
var m = [];
var c = 0;
               var edituserval =   $('input:checkbox').map(function (val) {
                    console.log($(this).prop("checked")+' edit check val = '+$(this).val());
                    
                     if($(this).prop("checked")===true){
                        m[c] = $(this).val();
                        c++;
                    }

        });
            // var edituserval = '';
                //     var $checkes = $('input:checkbox[name="task_assign_to[]"]').change(function () {
                //     var vals = $checkes.filter(':checked').map(function () {
                //         return this.value;
                //     }).get();
                //     console.log(vals);
                //     edituserval = vals;
                //     // alert(JSON.stringify(vals));
                //     // var $_assignTo = taskarr['_assignTo'] = JSON.stringify(vals);
                // });

              $_assignToValue =m[0];
                 console.log('m='+ m);


                var $_startDateValue = document.getElementById('s-startdate').value;
                console.log('_startDateValue = '+$_startDateValue);
                var $_endDateValue = document.getElementById('s-enddate').value;
                console.log('_endDateValue = '+$_endDateValue);
                var $_priorityValue = document.getElementById('s-priority').value;
                console.log('_priorityValue = '+$_priorityValue);
                var $_statusValue = document.getElementById('s-status').value;
                console.log('_statusValue = '+$_statusValue);
                var $_taskProjectId = 

console.log('before ajax task id = '+$_taskId);
 $.ajaxSetup({   
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    var type = "POST";
    var ajaxurl = '/updatetask';
   
    var data = {
             '_taskId':$_taskId,
            '_taskValue':$_taskValue,
            
            '_taskTextValue':$_taskTextValue,
            
            '_assignTo':m,
            
            '_startDateValue':$_startDateValue,

            
            '_endDateValue':$_endDateValue,
            
            '_priorityValue':$_priorityValue,
      
    }

    $.ajax({
        type: type,
        url: ajaxurl,
        data: data,
        dataType: 'json',
        async:false,


        success: function (data) {

           console.log(data);
             $_sweet_alert(data);
            // return 'I am from ajax';
        //    globalajaxdata = data;
          location.reload(); 

        },
        error: function (data) {
            console.log(data);
        }
    });




/* Auto update value */

                var $_taskProgressValue = $('.range-count-number').attr('data-rangeCountNumber');

                var $_taskDataAttr = $_outerThis.parents('.card').find('h4').attr('data-taskTitle' , $_taskValue);
                var $_taskTitle = $_outerThis.parents('.card').find('h4').html($_taskValue);

                /* Task Description */
                var $_taskTextDataAttr = $_outerThis.parents('.card').find('p:not(".progress-count, .ppriority  , .pstartdate , .penddate , .passignto")').attr('data-tasktext' , $_taskTextValue);
                var $_taskText = $_outerThis.parents('.card').find('p:not(".progress-count, .ppriority , .pdate,.passignto")').html($_taskTextValue);


                 /* Task Assign To */
                 var $_assignToDataAttr = $_outerThis.parents('.card').find('p:not(".progress-count, .ppriority , .pdate,.desc")').attr('data-assignto' , $_assignToValue);
                 var $_assignTo = $_outerThis.parents('.card').find('span:not(".sstartdate,.senddate,.screateddate, .spriority")').html($_assignToValue);

                 
                       
                $ed =  document.getElementById('s-enddate').value ;
                
                $sd = document.getElementById('s-startdate').value;



                 // /* Task Start Date */
                var $_startDateDataAttr = $_outerThis.parents('.card').find('p:not(".progress-count, .ppriority , .passignto,.desc")').attr('data-startdate' , $_startDateValue);
                var $_startDate = $_outerThis.parents('.card').find('span:not(".sassignto,.senddate,.screateddate, .spriority")').html($sd);


                 /* Task End date */
                 var $_endDateDataAttr = $_outerThis.parents('.card').find('p:not(".progress-count, .ppriority , .passignto,.desc")').attr('data-enddate' , $_endDateValue);
                 var $_endDate = $_outerThis.parents('.card').find('span:not(".sassignto,.sstartdate,.screateddate, .spriority")').html($ed);

                 
                  /* Task Priority */
                var $_priorityDataAttr = $_outerThis.parents('.card').find('p:not(".progress-count, .pdate , .passignto,.desc")').attr('data-priority' , $_priorityValue);
                var $_priority = $_outerThis.parents('.card').find('span:not(".sassignto,.sstartdate,.screateddate, .senddate")').html($_priorityValue);


                //  /* Task status */
                //  var $_taskTextDataAttr = $_outerThis.parents('.card').find('p:not(".progress-count")').attr('data-tasktext' , $_taskTextValue);
                //  var $_taskText = $_outerThis.parents('.card').find('p:not(".progress-count")').html($_taskTextValue);
 


                /* progress count */
                var $_taskProgressStyle = $_outerThis.parents('.card').find('div.progress-bar').attr('style', "width: " + $_taskProgressValue +"%");
                var $_taskProgressDataAttr = $_outerThis.parents('.card').find('div.progress-bar').attr('data-progressState', $_taskProgressValue);
                var $_taskProgressAriaAttr = $_outerThis.parents('.card').find('div.progress-bar').attr('aria-valuenow', $_taskProgressValue);
                var $_taskProgressProgressCount = $_outerThis.parents('.card').find('.progress-count').html($_taskProgressValue+"%");



            /* Auto update value end */

            $('#addTaskModal').modal('hide');
            var setDate = $('.taskDate').html('');
            $('.taskDate').hide();
        })
        $('#addTaskModal').modal('show');
      })
    }
showtaskajax();
// $_editList();
$_deleteList();
$_clearList();
addTask();
// $_taskEdit();
$_taskDelete();
// $_taskSortable();

});