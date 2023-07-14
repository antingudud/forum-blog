import { reactive } from "vue";

export const store = reactive({
    access_token: localStorage.access_token || "",
    list_refresh_switch: false,
    username: localStorage.username || "",
    UID: localStorage.UID || ""
})