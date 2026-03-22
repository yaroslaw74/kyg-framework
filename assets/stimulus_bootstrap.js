import { startStimulusApp } from "@symfony/stimulus-bundle";
import toglePassword from "@symfony/ux-toggle-password";
import Flatpickr from "stimulus-flatpickr";
import Swup from "@symfony/ux-swup";

const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
app.register("flatpickr", Flatpickr);
app.register("swup", Swup);
app.register("toggle-password", toglePassword);
