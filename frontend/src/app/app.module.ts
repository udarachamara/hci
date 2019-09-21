import { BrowserModule } from '@angular/platform-browser';
import { NgModule, Injectable } from '@angular/core';
import { ReactiveFormsModule, FormsModule } from '@angular/forms';
import { HttpModule } from '@angular/http';
import { RequestInterceptor } from './shared/request-interceptor';
import { HttpClient, HttpBackend, HTTP_INTERCEPTORS, HttpClientModule } from '@angular/common/http';
import { TranslateHttpLoader } from '@ngx-translate/http-loader';
import { TranslateModule, TranslateLoader } from '@ngx-translate/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { NavBarComponent } from './nav-bar/nav-bar.component';
import { HomeComponent } from './components/home/home.component';
import { ProductGridComponent } from './components/product-grid/product-grid.component';
import { AboutUsComponent } from './components/about-us/about-us.component';
import { ContactUsComponent } from './components/contact-us/contact-us.component';
import { FooterComponent } from './footer/footer.component';
import { ProductDetailComponent } from './components/product-detail/product-detail.component';
import { ProductsComponent } from './components/products/products.component';
import { SideBarComponent } from './side-bar/side-bar.component';
import { CartComponent } from './cart/cart.component';
import { PaymentComponent } from './payment/payment.component';
import { MyProfileComponent } from './components/my-profile/my-profile.component';
import { MenuGroupTreeComponent } from './sections/menu-group-tree/menu-group-tree.component';
import { TextSpeechService } from './services/text-speech.service';

@Injectable({providedIn: 'root'})
export class HttpClientTrans extends HttpClient {
  constructor(handler: HttpBackend) {
    super(handler);
  }
}

export function HttpLoaderFactory(httpClient: HttpClientTrans) {
  return new TranslateHttpLoader(httpClient);
}

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    ProductGridComponent,
    AboutUsComponent,
    ContactUsComponent,
    NavBarComponent,
    FooterComponent,
    ProductDetailComponent,
    ProductsComponent,
    SideBarComponent,
    CartComponent,
    PaymentComponent,
    MyProfileComponent,
    MenuGroupTreeComponent,
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    ReactiveFormsModule,
    FormsModule,
    HttpModule,
    HttpClientModule,
    TranslateModule.forRoot(
      {
        loader: {
          provide: TranslateLoader,
          useFactory: HttpLoaderFactory,
          deps: [HttpClientTrans]
      }
      }
    ),
  ],
  providers: [
    TextSpeechService,
    {
      provide: HTTP_INTERCEPTORS,
      useClass: RequestInterceptor,
      multi: true,
    },
  ],
  bootstrap: [AppComponent]
})
export class AppModule { }
