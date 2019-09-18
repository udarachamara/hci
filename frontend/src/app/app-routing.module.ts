import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from './components/home/home.component';
import { AboutUsComponent } from './components/about-us/about-us.component';
import { ContactUsComponent } from './components/contact-us/contact-us.component';
import { ProductDetailComponent } from './components/product-detail/product-detail.component';
import { ProductsComponent } from './components/products/products.component';
import { CartComponent } from './cart/cart.component';
import { PaymentComponent } from './payment/payment.component';
import { MyProfileComponent } from './components/my-profile/my-profile.component';


const routes: Routes = [
  {
    path: '',
    component: HomeComponent
  },
  {
    path: 'about-us',
    component: AboutUsComponent
  },
  {
    path: 'contact-us',
    component: ContactUsComponent
  },
  {
    path: 'product-details/:id',
    component: ProductDetailComponent
  },
  {
    path: 'products-detail/:id',
    component: ProductDetailComponent
  },
  {
    path: 'products-category/:category',
    children: [
      {
        path: '',
        component: ProductsComponent
      },
      {
        path: 'product-details/:id',
        component: ProductDetailComponent
      }
    ]
  },
  {
    path: 'cart',
    component: CartComponent
  },
  {
    path: 'my-profile',
    component: MyProfileComponent
  },
  {
    path: 'cart/payment',
    component: PaymentComponent
  }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
