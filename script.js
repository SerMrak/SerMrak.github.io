const pages = {
  1: "",
  2: "",
  3: "",
  4: "",
  5: "",
  6: "",
  7: "",
  8: "",
  9: "",
  10: "",
  11: "",
  12: "",
  13: "",
  14: "",
  15: "",
  16: "",
  17: "",
  18: "",
  19: "",
  20: "",
  21: "",
  22: "",
  23: "",
  24: "",
  25: "",
  26: "",
  27: "",
  28: "",
  29: "",
  30: "",
  31: "",
  32: "",
  33: "",
  34: "",
  35: "",
  36: "",
  37: "",
  38: "",
  39: "",
  40: "",
  41: "",
  42: "",
  43: "",
  44: "",
  45: "",
  46: "",
  47: "",
  48: "",
  49: "",
  50: ""
};

// Генерируем случайное число от 1 до 50
const number = Math.floor(Math.random() * 50) + 1;

// Проверяем, есть ли страница для этого числа
if (pages[number]) {
  // Если есть, то перенаправляем на эту страницу
  window.location.href = pages[number];
} else {
  // Если нет, то выводим сообщение об ошибке в консоль браузера
  console.error('Для числа ' + number + ' не найдена страница');
}