<template>
    <div class="lastest-tweet" id="male-tweet">
        <div class="tweet-user">
            <div class="drop"></div>
            <div class="user-info">
                <span class="user-name">المستعمل</span>
                <span class="tweet-email">{{username}}</span>
            </div>
        </div>
        <p class="tweets-content">{{tweet}}</p>
    </div>
</template>

<script>
export default {
    data() {
        return {
            tweet: "",
            username: "",
            hashtag: {
                hashtag_id: 1
            }
        }
    },
    created() {
        this.getCount();
        setInterval(this.getCount, 1000);
    },
    methods: {
        getCount() {
            let base_url = document.getElementById('base_url').value;
            let uri = base_url+'api/latest-tweet';
            this.axios.post(uri, this.hashtag).then((response) => {
                this.tweet = response.data.tweet;
                this.username = response.data.username;
            })
        }
    }
}
</script>