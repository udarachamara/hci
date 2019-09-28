import { Component, OnInit } from '@angular/core';
import { TextSpeechService } from 'src/app/services/text-speech.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.css']
})
export class HomeComponent implements OnInit {


  constructor(
    private textSpeechService: TextSpeechService) { }

  ngOnInit() {

  }

  readLinkDescription(value) {
    let Speech = 'Click here to go view ' + value;
    this.textSpeechService.initializeSpeach(Speech);
  }

}
