<?php
/**
 * This file defines the Phooty-specific events that can occur during the
 * simulation.
 * 
 * @todo make more process centric vs stats
 */
return [
    // Simulation events
    'sim.open',     // the simulation is initialised
    'sim.start',    // simulation starts
    'sim.end',      // simulation ends successfully
    'sim.abort',    // simulation ends with an error
    'sim.exit',     // simulation has finished running, either successfully or in error

    // timer events
    'timer.start',  // timer has started
    'timer.resume', // timer has resumed
    'timer.stop',   // the timer has stopped
    'timer.clear',  // the timer has been cleared

    // player events
    'player.gain',  // the player gains possession of the sherrin
    'player.dispose',  // the player disposes of the sherrin
    'player.knock', // the player knocks sherrin away
    'player.move',  // the player moves
    'player.idle',  // the player is idling
    'player.score', // the player scores
    'player.bounce', // the player bounces the sherrin
    

    // play events
    'play.start',   // start a passage of play
    'play.stop',    // halt a passage of play

];
