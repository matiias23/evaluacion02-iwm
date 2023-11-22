import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { ProductService } from './product.service';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [CommonModule, RouterOutlet],
  templateUrl: './app.component.html',
  styleUrl: './app.component.css'
})
export class AppComponent implements OnInit {
  products: any[] = [];
  title = 'client';

  constructor(private productService: ProductService) { }

  ngOnInit() {
  
    this.productService.getProducts().subscribe((data: any[]) => {
      this.products = data;
    });
  }
}
