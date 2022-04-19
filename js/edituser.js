var UserForm={
    data:{
        tempPrf:{},
        FirstName:"",
        LastName:"",
        StoreName:"",
        WhatsappNo:"",
        MobileNo:"",
        EmailID:"",
        Address1:"",
        Address2:"",
        PINCode:"",
        GSTNo:"",
        UserType:"",
        Password:"",        
        AccID:"",
        AppModules:"",
        UserPermission:[]
    },
    mounted:function(){
        axios.post('userinfo',{expt:localStorage.unid})
                            .then(function(response){
                                var us=response.data;
                                app.FirstName=us[0].FirstName;
                                app.LastName=us[0].LastName;
                                app.StoreName=us[0].StoreName;
                                app.MobileNo=us[0].MobileNO;
                                app.WhatsappNo=us[0].WhatsappNO;
                                app.EmailID=us[0].EmailID;
                                app.Address1=us[0].Address1;
                                app.Address2=us[0].Address2;
                                app.PINCode=us[0].PINCode;
                                app.GSTNO=us[0].GSTNo;
                                app.UserType=us[0].UserType;
                                app.Password=us[0].Password;
                            }).catch(function(error){ alert(error);});
            axios.post('usermodules')
                .then(function(response){
                    app.AppModules=response.data; 
                    axios.post('getusermod',{id:localStorage.unid})
                    .then(function(response){
                        app.UserModules=response.data;
                                                        
                        var counter=0;
                        while(counter<app.AppModules.length){
                            var temppermission={};
                            var searchresult="";
                            var searchkey=app.AppModules[counter].ModuleID;
                            if(app.UserModules.length>0){
                                var searchresult=app.UserModules.filter(obj=> obj.ModuleID == searchkey);
                            }
                            if(searchresult.length>0){											
                                temppermission.ModuleID=app.AppModules[counter].ModuleID;
                                temppermission.ModuleName=app.AppModules[counter].ModuleName;
                                temppermission.Save=(searchresult[0].PSave==0) ? false:true;
                                temppermission.Edit=(searchresult[0].PEdit==0) ? false:true;
                                temppermission.Print=(searchresult[0].PPrint==0) ? false:true;
                                temppermission.Delete=(searchresult[0].PDelete==0) ? false:true;
                            }else{
                                temppermission.ModuleID=app.AppModules[counter].ModuleID;
                                temppermission.ModuleName=app.AppModules[counter].ModuleName;
                                temppermission.Save=false;
                                temppermission.Edit=false;
                                temppermission.Print=false;
                                temppermission.Delete=false;
                            }
                            
                            app.UserPermission.push(temppermission);
                            counter++;
                    
                        }
                    })
                    .catch(function(error){ alert(error);})    
                }).catch(function(error){ alert(error);})                         
        
    },
    methods:{
     save:async function(){
         app.auth=await app.chkauth("User Management","Save");
         if(app.auth){
            app.tempPrf.FirstName=app.FirstName;
            app.tempPrf.LastName=app.LastName;
            app.tempPrf.StoreName=app.StoreName;
            app.tempPrf.WhatsappNo=app.WhatsappNo;
            app.tempPrf.EmailID=app.EmailID;
            app.tempPrf.MobileNo=app.MobileNo;
            app.tempPrf.Address1=app.Address1;
            app.tempPrf.Address2=app.Address2;
            app.tempPrf.PINCode=app.PINCode;
            app.tempPrf.GSTNo=app.GSTNo;
            app.tempPrf.UserType=app.UserType;
            app.tempPrf.Password=app.Password;
            app.tempPrf.uid=localStorage.unid;
         
            let senddata=app.toFormData(app.tempPrf);
            var ans=confirm("Save the Profile Info?");
            if(ans){
            axios.post('updateuser',senddata)
            .then(function(response){
                var result=response.data;
         
                    if(result==="NO"){
                        alert("Already Registered");
                    }else{
                    axios.post('permission',{pdata:JSON.stringify(app.UserPermission),uid:result})
                    .then(function(response){
                        alert("User Added Successfuly");
                        var ans=confirm("Do you want to Add More User?");
                        if(ans){
                            window.location.assign("addu");
                        }else{
                            window.location.assign("users");
                        }
                        
                    })
                    .catch(function(error){alert(error);})
                    }
                })
            .catch(function(error){ alert(error);})
            }
           }else{
               alert("Access Denied");
           }
        },
        toFormData: function(obj) {
            let formData = new FormData();
            for(let key in obj) {
                formData.append(key, obj[key]);
            }
            this.file = this.$refs.file.files[0];
            formData.append('file',this.file);
            return formData;
        }

    }
    
}