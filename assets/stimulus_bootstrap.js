import { startStimulusApp } from "@symfony/stimulus-bundle";
import Swup from "@symfony/ux-swup";
import Flatpickr from "stimulus-flatpickr";

const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
app.register("swup", Swup);
app.register("flatpickr", Flatpickr);
