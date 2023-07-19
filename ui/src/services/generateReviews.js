import axios from "axios";

export async function generateReviews(restaurantData) {
  console.log(restaurantData);
  const { data } = await axios.post(`/api/generate-reviews`, restaurantData);
console.log(data.original);
// console.log(JSON.parse(data.original));
  return data.original
}