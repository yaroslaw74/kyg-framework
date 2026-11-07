import { startStimulusApp } from "@symfony/stimulus-bundle";

const app = startStimulusApp();
// Connect Symfony UX Inspector to the Stimulus application in debug mode.
if (app.debug) {
    window.Stimulus = app;
}
// register any custom, 3rd party controllers here
// app.register('some_controller_name', SomeImportedController);
