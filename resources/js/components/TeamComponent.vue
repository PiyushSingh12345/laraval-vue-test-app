<template>
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div v-bind:class="{ succmsg: succmsg }">
                <div class="form-group">
                    <div class="alert alert-success">{{ actionmsg }}</div>
                </div>
            </div>
            <form method="post" name="addteam" id="addteam" action="#" enctype="multipart/form-data" @submit.prevent="addTeam">
                
                <div class="form-group row">
                    <label for="tname" class="col-md-4 col-form-label">Team Name</label>
                    <div class="col-md-6">
                        <input @keydown.space.prevent id="tname" name="tname" type="text" class="form-control" v-model="team.tname"  value="" required>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">
                            Add Team
                        </button>
                    </div>
                </div>
            </form>
            <hr class="border-primary"/>
            <h3>Team List</h3>
            <div class="table-responsive" v-if="team_record">          
                <table class="table" >
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>Team Name</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(team, index) in team_record" :key="index">
                            <td> {{++index}} </td>
                            <td>{{team.name}}</td>
                            <td><button class="btn btn-info btn-sm" v-on:click="edit_team(team.id,team.name)" data-toggle="modal" data-target="#editTeamModal">Edit</button></td>
                            <td><button class="btn btn-danger btn-sm" data-target="#deleteTeamModal" v-on:click="deleteId(team.id)"  data-toggle="modal" v-bind:id="id">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
             <div class="modal fade" id="editTeamModal" v-if="show_modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Team Edit</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" name="updateteam" id="updateteam" action="#" enctype="multipart/form-data" @submit.prevent="updateTeam">
                                <div class="container">
                                    <div class="form-group row">
                                        <label for="uname" class="col-md-4 col-form-label" >Team Name</label>
                                        <div class="col-md-6">
                                            <input @keydown.space.prevent id="uname" name="uname" type="text" class="form-control" v-model="upost.uname" required>
                                        </div>
                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary">
                                                Update Team
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>


            <div class="modal fade" id="deleteTeamModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">Team Delete</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            
                            <div class="container">
                                <div class="form-group">
                                    <p>Are you sure want to delete the team? </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-success " v-on:click="deleteTeam()">Ok</button>
                            <button class="btn btn-danger" v-on:click="hideModal()">Cancel</button>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script>
    
export default {
        name: 'teamInfo',
        data() {
            return {
                team_record:[],
                team: {
                    'tname': ''
                },
                show_modal:false,
                upost: {
                    'uid':'',
                    'uname': ''
                },
                succmsg:  true,
                id: '',
                succmsg:  true,
                actionmsg: '',
            }
        },
        created(){
             this.getTeamData();
        },
        methods: {
            addTeam() {
                if(this.team.tname==""){
                         this.actionmsg = "Please enter team name";
                }
                this.$http.post('/api/teams',{
                        'team_name': this.team.tname
                    }).
                    then((data) => {
                        this.succmsg = false;
                        console.log(data);
                        this.getTeamData();
                        this.team.tname = '';
                        this.actionmsg = "Team name inserted successfully";

                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                    });
            },
            edit_team(id,name){
                this.show_modal = true;
                this.upost.uid= id;
                this.upost.uname = name;
            },
            updateTeam(){
                this.$http.put(`/api/teams/${this.upost.uid}`, {
                        'team_name': this.upost.uname,
                    })
                    .then(response => {
                          this.succmsg = false;
                          this.upost.uid= '';
                          this.upost.uname='';
                          this.getTeamData();
                          var self = this;
                          setTimeout(function(){
                                self.succmsg = true;
                          },3000);
                          this.actionmsg = "Team name updated successfully";
                          this.show_modal = false;

                          $('#editTeamModal').modal('hide');
                          
                          
                    })
                    .catch(error => {
                         console.log(error);
                    })
            },
            async getTeamData() {
                    await this.$http.get('/api/teams')
                    .then(response => {
                            this.team_record = response.data.data
                    })
                    .catch(error => {
                         console.log(error)
                    });
            },
            deleteId(id) {
                    this.id = id;
            },
            deleteTeam() {
                   this.$http.delete('api/teams/'+this.id).
                    then((data) => {
                        this.succmsg = false;;
                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                         
                        this.actionmsg = "Team name deleted successfully";
                        this.getTeamData();
                        $('#deleteTeamModal').modal('hide');
                    });
            },
            hideModal() {
                $('#deleteTeamModal').modal('hide');
            }
        },
        computed: {
        }
    }
</script>
<style scoped>
    .succmsg {
        display: none;
    }
</style>