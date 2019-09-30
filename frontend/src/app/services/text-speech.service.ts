import { Injectable } from '@angular/core';
import Speech from 'speak-tts';

@Injectable({
  providedIn: 'root'
})
export class TextSpeechService {

  private speech = new Speech();
  public EnableStatus = false;

  constructor() {
    this.initSpeech();
  }

  initSpeech(){
    this.speech.init({
      volume: 0.5,
      lang: 'en-GB',
      rate: 0.9,
      pitch: 0.5,
      voice: 'Google US English',
      splitSentences: true,
      listeners: {
        onvoiceschanged: (voices) => {
          // console.log("Event voiceschanged", voices);
        }
      }
    }).then(data => {
      // console.log("Speech is ready, voices are available", data);
      this.speech.speak({
        text:'Are You Want to Enable Text Speech.Press the Enter button ',
        queue: false
      }).then(() => {
        // console.log("Success !")
      }).catch(e => {
        // console.error("An error occurred :", e)
      });
    });
  }


  initializeSpeach(text: string = ''): void {
    this.speech.setLanguage('en-GB');
    this.speech.setVoice('Google US English');
    if (this.speech.hasBrowserSupport() && this.EnableStatus) {
      this.speech.speak({
        text,
        queue: false
      }).then(() => {
        // console.log("Success !")
      }).catch(e => {
        // console.error("An error occurred :", e)
      });
    }

  }

}
