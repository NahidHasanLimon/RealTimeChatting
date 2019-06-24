<style scoped>
  .panel-block{
    flex-direction: column;

  }
  .chat{
    width: 100%;
    padding: 20px;
    box-shadow: inset 0 0 20px 0 grey;
    margin-bottom: 20px;
    border: 1px solid black;
    max-height: 600px;
    overflow-x:auto;

  }
  .chat .chat-right, .chat .chat-left{
    max-width: 70%;
    box-shadow: 0 0 7px 0px grey;
    padding: 8px;
    margin: 4px;

  }
  .chat-right{
    float: right;
  }

  .chat-left{
    float: left;
  }
  .no-message{
    height: 200px;
    display: flex;
    align-items: center;
  }
  /* .message-body{
    overflow: auto;
  } */
.datetime{
  font-size: 10px;
  font-weight: 10px;
  padding: 4px;
  break-before: always;
  color: red;

}
</style>
<template>
    <div class="panel-block">

      <div class="chat" v-if="chats.length !=0">

            <div v-for="chat in chats" style="overflow:auto;" >

              <div class="chat-right has-text-info" v-if="chat.user_id==userid">
                  {{chat.chat}}
                  <span class="datetime has-text-black"><br> <time>{{chat.created_at|mydate}}</time></span>
              </div>

              <div class="chat-left has-text-primary" v-else >
                  {{chat.chat}}
                  <span class="datetime"><br> <time>{{chat.created_at|mydate}}</time></span>
              </div>

            </div>
      </div>
      <div v-else  class="no-message">

      </div>
      <chat-composer v-bind:userid="userid"  v-bind:chats="chats"  v-bind:friendid="friendid"> </chat-composer>

    </div>
</template>

 <script>
    export default {
        props: ['chats', 'userid', 'friendid']
    }
</script>
