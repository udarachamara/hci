import {Component, OnInit} from '@angular/core';
import {TranslateService} from "@ngx-translate/core";
import {TextSpeechService} from "../../services/text-speech.service";

@Component({
  selector: 'app-my-profile',
  templateUrl: './my-profile.component.html',
  styleUrls: ['./my-profile.component.css']
})
export class MyProfileComponent implements OnInit {

  constructor(
    private translate: TranslateService,
    private textSpeechService: TextSpeechService) {
  }

  ngOnInit() {
  }


  readDescription(value) {
    this.textSpeechService.initializeSpeach(value);
  }
}
