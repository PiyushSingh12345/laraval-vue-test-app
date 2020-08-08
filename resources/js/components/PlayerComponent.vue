<template>
    <div class="row justify-content-center">
        
        <div class="col-md-8">
            <div v-bind:class="{ succmsg: succmsg }">
                <div class="form-group">
                    <div class="alert alert-success">{{ actionmsg }}</div>
                </div>
            </div>
            <form method="post" name="addplayer" id="addplayer" action="#" enctype="multipart/form-data" @submit.prevent="addplayer">
                <div class="form-group row">
                    <label for="pf_name" class="col-md-2 col-form-label">First Name</label>
                    <div class="col-md-4">
                        <input @keydown.space.prevent id="pf_name" name="first_name" type="text" class="form-control" v-model="player.first_name"  value="" required>
                    </div>
                    <label for="pl_name" class="col-md-2 col-form-label">Last Name</label>
                    <div class="col-md-4">
                        <input @keydown.space.prevent id="pl_name" name="last_name" type="text" class="form-control" v-model="player.last_name"  value="" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pt_id" class="col-md-2 col-form-label">Select Team</label>
                    <div class="col-md-7">
                        <select class="form-control" id="pt_id" name="team_id" v-model="player.team_id" required>
                            <option value="">Select from here</option>
                            <option v-for="(team, index) in team_record" :key="index" :value="team.id">{{team.name}}</option>
                            
                        </select>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary btn-block">
                            Add Player
                        </button>
                    </div>
                </div>
            </form>
            <hr class="border-primary"/>
            <h3>player List</h3>
            <div class="table-responsive" v-if="player_record">          
                <table class="table" >
                    <thead>
                        <tr>
                            <th>S. No.</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Team Id</th>
                            <th colspan="2" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(player, index) in player_record" :key="index">
                            <td> {{++index}} </td>
                            <td>{{player.first_name}}</td>
                            <td>{{player.last_name}}</td>
                            <td>{{player.team_id}}</td>
                            <td><button class="btn btn-info btn-sm" v-on:click="edit_player(player.id,player.first_name,player.last_name,player.team_id)" data-toggle="modal" data-target="#editplayerModal">Edit</button></td>
                            <td><button class="btn btn-danger btn-sm" data-target="#deleteplayerModal" v-on:click="deleteId(player.id)"  data-toggle="modal" v-bind:id="id">Delete</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            
             <div class="modal fade" id="editplayerModal" v-if="show_modal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">player Edit</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            <form method="post" name="updateplayer" id="updateplayer" action="#" enctype="multipart/form-data" @submit.prevent="updateplayer">
                                <div class="form-group row">
                                    <label for="pf_name" class="col-md-4 col-form-label">First Name</label>
                                    <div class="col-md-8">
                                        <input @keydown.space.prevent id="pf_name" name="ufirst_name" type="text" class="form-control" v-model="player.ufirst_name"  value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pl_name" class="col-md-4 col-form-label">Last Name</label>
                                    <div class="col-md-8">
                                        <input @keydown.space.prevent id="pl_name" name="ulast_name" type="text" class="form-control" v-model="player.ulast_name"  value="" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pt_id" class="col-md-4 col-form-label">Select Team</label>
                                    <div class="col-md-8">
                                        <select class="form-control" id="pt_id" name="uteam_id" v-model="player.uteam_id" required>
                                            <option value="">Select from here</option>
                                            <option v-for="(team, index) in team_record" :key="index" :value="team.id">{{team.name}}</option>
                                            
                                        </select>
                                    </div>
            
                                </div>
                            </form>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">
                                Add Player
                            </button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                        
                    </div>
                </div>
            </div>


            <div class="modal fade" id="deleteplayerModal">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                    
                        <!-- Modal Header -->
                        <div class="modal-header">
                        <h4 class="modal-title">player Delete</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        
                        <!-- Modal body -->
                        <div class="modal-body">
                            
                            <div class="container">
                                <div class="form-group">
                                    <p>Are you sure want to delete the player? </p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button class="btn btn-success " v-on:click="deleteplayer()">Ok</button>
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
        name: 'playerInfo',
        data() {
            return {
                player_record:[],
                team_record:[],
                player: {
                    'first_name':'',
                    'last_name':'',
                    'team_id':'',
                },
                show_modal:false,
                upost: {
                    'uid':'',
                    'ufirst_name':'',
                    'ulast_name':'',
                    'uteam_id':'',
                },
                succmsg:  true,
                id: '',
                succmsg:  true,
                actionmsg: '',
            }
        },
        created(){
             this.getplayerData();
             this.getteamData();
        },
        methods: {
            addplayer() {
                
                if(this.player.first_name==""){
                         this.actionmsg = "Please enter player first name";
                }
                if(this.player.last_name==""){
                         this.actionmsg = "Please enter player last name";
                }
                if(this.player.team_id==""){
                         this.actionmsg = "Please Select Team Name";
                }
                this.$http.post('/api/players',{
                        first_name: this.player.first_name,
                        last_name: this.player.last_name,
                        team_id : this.player.team_id
                    }).
                    then((data) => {
                        this.succmsg = false;
                        console.log(data);
                        this.getplayerData();
                        this.player.pf_name = '';
                        this.actionmsg = "player name inserted successfully";

                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                    });
            },
            edit_player(id,name){
                this.show_modal = true;
                this.upost.uid= id;
                this.upost.uname = name;
            },
            updateplayer(){
                alert(this.upost);
                this.$http.put(`/api/players/${this.upost.uid}`, {
                        'first_name': this.upost.uname,
                        'last_name': this.upost.uname,
                        'team_id': this.upost.uname,
                    })
                    .then(response => {
                          this.succmsg = false;
                          this.upost.uid= '';
                          this.upost.uname='';
                          this.getplayerData();
                          var self = this;
                          setTimeout(function(){
                                self.succmsg = true;
                          },3000);
                          this.actionmsg = "player name updated successfully";
                          this.show_modal = false;

                          $('#editplayerModal').modal('hide');
                          
                          
                    })
                    .catch(error => {
                         console.log(error);
                    })
            },
            async getplayerData() {
                    await this.$http.get('/api/players')
                    .then(response => {
                            this.player_record = response.data.data
                    })
                    .catch(error => {
                         console.log(error)
                    });
            },
            async getteamData() {
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
            deleteplayer() {
                   this.$http.delete('api/players/'+this.id).
                    then((data) => {
                        this.succmsg = false;;
                        var self = this;
                        setTimeout(function(){
                            self.succmsg = true;
                        },3000);
                         
                        this.actionmsg = "player name deleted successfully";
                        this.getplayerData();
                        $('#deleteplayerModal').modal('hide');
                    });
            },
            hideModal() {
                $('#deleteplayerModal').modal('hide');
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
    .showmodal {
        display: none !important;
        opacity: 0;
    }
</style>