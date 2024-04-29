import { defineStore } from "pinia";
export const useGeneralStore = defineStore("general", {
	state: () => ({
		isPostOverlay: false,
		isCropperModal: false,
		isImageDisplay: null,
		issue: JSON.parse(localStorage.getItem('general[3]')) || [],
		picked: JSON.parse(localStorage.getItem('general[4]')) || [],
		create: JSON.parse(localStorage.getItem('general[5]')) || [],
	}),
	persist: true,
});