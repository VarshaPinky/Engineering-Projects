from django.test import SimpleTestCase
from django.urls import reverse, resolve
from system.views import car_list, car_update

class TestUrls(SimpleTestCase):

	def test_list_url_is_resolved(self):
		url = reverse('car_list')
		#print(resolve(url))
		self.assertEquals(resolve(url).func, car_list)

	def test_update_url_is_resolved(self):
		url = reverse('car_edit')
		#print(resolve(url))
		self.assertEquals(resolve(url).func, car_update)