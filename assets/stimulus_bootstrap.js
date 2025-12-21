import { startStimulusApp } from "@symfony/stimulus-bundle";
import Swup from "@symfony/ux-swup";

const app = startStimulusApp();
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
app.register("swup", Swup);
