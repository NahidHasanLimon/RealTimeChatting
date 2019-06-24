<style scoped>

.btn {
  background-color: DodgerBlue;
  border: none;
  color: white;
  padding: 2px 2px 2px 2px;
  font-size: 21px;
  cursor: pointer;
}

/* Darker background on mouse-over */
.btn:hover {
  background-color: RoyalBlue;
}

.panel-block{
  flex-direction: row;
  width: 100%;
  border: none;
  padding: 0;
}
input{
  border-radius: 0;
    padding: 2px 2px 2px 2px;
    min-height: 60px;
}
.auto-width{
  width: auto;
    padding: 2px 2px 4px 4px;
}
</style>
<template>
    <div class="panel-block">

              <div class="control">
                      <input type="text" class="input" name="" value="" @keyup.enter="sendChat"
                       v-model="chat">
                </div>

              <div class="control auto-width">

                 <button class="btn"  @click="sendChat"> <i class="fa fa-arrow-right" ></i> Send </button>

            <!-- <input type="button" class="button" value="Send" v-on:click="sendChat"> -->
                </div>
                <!-- <input @keyup.enter="" placeholder="Reply here" class="fb-comment-input" />
    <i class="material-icons fb-button-right fb-send">&#x21E8;</i> -->



    </div>
</template>

 <script>
    export default {
        props: ['chats', 'userid', 'friendid'],
        data() {
            return {
                chat: ''
            }
        },
        methods: {
            sendChat: function(e) {
                if (this.chat != '') {
                    var data = {
                        chat: this.chat,
                        friend_id: this.friendid,
                        user_id: this.userid
                    }
                    this.chat = '';
                    axios.post('/chat/sendChat', data).then((response) => {
                        this.chats.push(data)
                    })
                }
            }
        }
    }
</script>
