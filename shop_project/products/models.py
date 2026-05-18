from django.db import models

class Category(models.Model):

    name = models.CharField(max_length=100)

    def __str__(self):
        return self.name


class Product(models.Model):

    category = models.ForeignKey(
        Category,
        on_delete=models.CASCADE,
        null=True,
        blank=True
    )

    name = models.CharField(max_length=200)

    price = models.IntegerField()

    image = models.ImageField(upload_to='products/')

    description = models.TextField()

    is_available = models.BooleanField(default=True)

    def __str__(self):
        return self.name
