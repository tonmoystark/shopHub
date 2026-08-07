
import Swal from 'sweetalert2';
import Alpine from 'alpinejs';
import './admin/delete-confirmation';
import './admin/image-preview';
import './admin/filters';
import "./frontend/cart-quantity";
import "./frontend/order-summary";
window.Alpine = Alpine;
window.Swal = Swal;

import { createIcons, icons } from "lucide";

createIcons({ icons });

Alpine.start();
