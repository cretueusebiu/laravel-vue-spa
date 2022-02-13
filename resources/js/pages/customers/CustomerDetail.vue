<template>
  <v-row>
    <v-col lg="4" md="5"> 
        <v-card> 
            <v-card-title class="flex-column justify-center">
            <v-avatar
                color="grey darken-1"
                size="128"
                class="mb-4"
            />
            <span class="mb-2">Hello World</span>
            <v-card-text>
                <h2 class="text-xl font-semibold mb-2">Customer Details</h2>
                <v-divider />
                <v-list dense>
                    <v-list-item class="px-0 mb-n2">
                        <span class="font-weight-medium me-2">Name:</span>
                        <span class="text--secondary">John Doe</span>
                    </v-list-item>
                    <v-list-item class="px-0 mb-n2">
                        <span class="font-weight-medium me-2">Phone:</span>
                        <span class="text--secondary">+92-345-123459761</span>
                    </v-list-item>
                </v-list>
            </v-card-text>
            </v-card-title>
        </v-card>
    </v-col>
    <v-col lg="8" md="7"> <v-card> Hello World </v-card></v-col>
  </v-row>
</template>

<script>
export default {
  middleware: "auth",
};
</script>